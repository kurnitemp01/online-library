<?php

    function get_all_variable(): array{
        return ["Rating", "History", "Penghargaan", "Click", "Wishlist", "Halaman"];
    }

    function define_weight(): array{
        /**
         * Untuk mendifinisikan weight masing masing variable
         * Bersifat konstan dan tidak ddapat di update
         */
        $weight = [
            [1.000, 2.000, 2.000, 3.000, 3.000, 4.000],
            [0.500, 1.000, 1.000, 2.000, 2.000, 3.000],
            [0.500, 1.000, 1.000, 2.000, 2.000, 3.000],
            [0.333, 0.667, 0.667, 1.000, 1.000, 2.000],
            [0.333, 0.667, 0.667, 1.000, 1.000, 2.000],
            [0.250, 0.500, 0.500, 0.750, 0.750, 1.000]
        ];

        return $weight;
    }

    function define_random_index($index): float{
        /**
         * Menghitung random index dari total variabel
         * terdapat standar tetap dalam penetuan random index
         * bisa dicek di materi PDF atau search langsung di google
         */
        $standard = [0.00, 0.00, 0.58, 0.90, 1.12, 
                     1.24, 1.32, 1.41, 1.45, 1.49, 
                     1.51, 1.48, 1.56, 1.57, 1.59];
        return $standard[$index];
    }

    function setup_total_variable_per_weight($datas): array{
        /**
         * Untuk menjumlahkan total X (objek/variabel/item) dalam 1 kolom 
         */

        $result = [];
        foreach ($datas as $outer_key => $outer_value) {
            $temp_result = 0;
            foreach ($outer_value as $inner_key => $inner_value) {
                $temp_result = $temp_result + $datas[$inner_key][$outer_key];
            }
            $result[$outer_key] = $temp_result;
        }

        return $result;
    }

    function setup_priority_vector($datas, $mode): array{
        /**
         * Untuk menghitung priority vector total X (objek/variabel/item) dalam 1 kolom 
         * Rumus :  Σ (nilai_variable / nilai_total_variable)
         */
        $total_per_variable = setup_total_variable_per_weight($datas);
        $total_priority_vector = 0;

        foreach ($datas as $outer_key => $outer_value) {
            $temp_result = 0;
            foreach ($outer_value as $inner_key => $inner_value) {
                if ($total_per_variable[$inner_key]){
                    $temp_result = $temp_result + ($datas[$outer_key][$inner_key] / $total_per_variable[$inner_key]);
                } else {
                    $temp_result = $temp_result + ($datas[$outer_key][$inner_key] / 1);
                }
            }
            
            if (count($outer_value)){
                $priority_vector = $temp_result / count($outer_value);
            } else {
                $priority_vector = $temp_result / 1;
            }
            
            array_push($datas[$outer_key], $priority_vector);
            $total_priority_vector = $total_priority_vector + $priority_vector;
        }
        array_push($total_per_variable, $total_priority_vector);

        if ($mode == "merged"){
            return array_merge($datas, [$total_per_variable]);
        } else {
            return $datas;
        }
    }

    function setup_pev($datas): array{
        /**
         * Untuk menghitung PEV 
         * Rumus :  Σ (nilai_total_variable / priority_vector_variable)
         */
        $source_datas = array_slice($datas, 0, -1);
        $total_datas = array_slice($datas, -1, 1);
        $pev = 0;

        foreach ($source_datas as $key => $value) {
            $pev = $pev + (end($source_datas[$key]) * $total_datas[0][$key]);
        }

        $result = [
            "data" => $datas,
            "pev" => $pev
        ];

        return $result;
    }

    function setup_ci_cr($datas, $mode){
        /**
         * Untuk menhitung CI dan CR
         * Rumus CI: Priority Vector - jumlah variable / jumlah variable - 1
         * Rumus CR: CI / Random Index
         */
        $total_variable = count($datas["data"]) - 1;

        if ($mode == "cr"){
            $random_index = define_random_index($total_variable - 1);
            $datas["cr"] = $datas["ci"] / $random_index;
        } else if ($mode == "ci") {
            $ci = ($datas["pev"] - $total_variable) / ($total_variable - 1);
            $datas["ci"] = $ci;
        }

        return $datas;
    }

    function setup_variable_comparision($datas){
        /**
         * Menghitung perbandingan nilai variable 
         * antar masing masing data
         */
        $response = [];
        $variables = get_all_variable();
        
        foreach ($variables as $key => $value) {
            $key = strtolower($value);
            $data = array_map(function($value) use ($key){
                return $value[$key];
            }, $datas);
            $temp_response = [];

            for ($i=0; $i < count($data); $i++) { 
                $current_value = $data[$i];
                $book_code = $datas[$i]["book_code"];

                $compared_value = array_map(function($val, $idx) use ($current_value, $datas){
                    $inner_book_code = $datas[$idx]["book_code"];
                    if ($val){
                        return [$inner_book_code => $current_value / $val];
                    }
                    return [$inner_book_code => 0];
                }, $data, array_keys($data));

                $temp_response[$book_code] = call_user_func_array("array_merge", $compared_value);
            }

            $response[$key] = $temp_response;
        }

        return $response;
    }

    function setup_object_score($datas, $weight, $book_code_list){
        /**
         * Untuk menghitung skor yang di dapat oleh masing masing buku
         */
        $variables = get_all_variable();

        $result = [];
        foreach ($book_code_list as $outer_key => $book_code) {
            $composite_weight = 0;
            foreach ($variables as $inner_key => $variable) {
                $current_key = strtolower($variable);
                $composite_weight = $composite_weight + ($datas[$current_key][$book_code] * $weight[$inner_key]);
            }
            array_push($result, [$book_code => $composite_weight]);
        }

        return call_user_func_array("array_merge", $result);
    }

    function ordering_object($datas, $lookup){
        /**
         * Untuk mengurutkaan data berdasarkan skor yang didapat
         */
        arsort($datas);

        $counter = 0;
        $result = array_map(function($value, $key) use (&$counter, $lookup){
            $counter++;
            $book_title = array_filter($lookup, function($data) use ($key){
                return $data["book_code"] == $key;
            });

            return [
                    "rate" => $value, 
                    "book_code" => $key, 
                    "position" => $counter,
                    "book_title" => array_values($book_title)[0]["book_name"]
                ];
        }, $datas, array_keys($datas));

        return $result;
    }

?>