<!-- Sumber Data Start -->
<div class="mb-4 mt-4">
    <h4 class="h4 mb-0 text-gray-800">Sumber Data</h4>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">

            <!-- Card Header -->
            <!-- <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Mentah</h6>
            </div> -->

            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-responsive table-striped" style="display: table;" id="tbl-raw-book" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Book Title</thwidth=>
                            <th class="text-center">Book Code</thwidth=>
                            <th class="text-center">Normalized Rating</thwidth=>
                            <th class="text-center">Normalized Page</th>
                            <th class="text-center">Count Award</th>
                            <th class="text-center">Transaction</th>
                            <th class="text-center">Click Rate</th>
                            <th class="text-center">Wishlist</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $counter = 0;
                            foreach ($raw_books as $key => $raw_book) {
                                $counter = $counter + 1;
                        ?>
                            <tr>
                                <td class="text-center"><?= $counter ?></td>
                                <td class="text-center"><?= $raw_book["book_name"] ?></td>
                                <td class="text-center"><?= $raw_book["book_code"] ?></td>
                                <td class="text-center"><?= number_format($raw_book["rating"], 3) ?></td>
                                <td class="text-center"><?= $raw_book["halaman"] ?></td>
                                <td class="text-center"><?= $raw_book["penghargaan"] ?></td>
                                <td class="text-center"><?= $raw_book["history"] ?></td>
                                <td class="text-center"><?= $raw_book["click"] ?></td>
                                <td class="text-center"><?= $raw_book["wishlist"] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Sumber Data End -->

<!-- Tahap 1 Start -->
<div class="mb-4 mt-4">
    <h4 class="h4 mb-0 text-gray-800">Tahap 1: Penentuan Bobot</h4>
</div> 
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-responsive table-striped" style="display: table;" id="tbl-weight-book" width="100%">
                    <thead>
                        <tr>
                            <th class_existslass="text-center">Kriteria</th>
                            <th class="text-center">Rating</th>
                            <th class="text-center">Transaction</th>
                            <th class="text-center">Award</th>
                            <th class="text-center">Normalized Page</th>
                            <th class="text-center">Click Rate</th>
                            <th class="text-center">Wishlist</th>
                            <th class="text-center">Page</th>
                            <th class="text-center">PV</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total_variable = count($variables);
                            $counter = 0;
                            foreach ($weight["data"] as $key => $value) {
                                if ($counter == $total_variable){
                                    $kriteria = "Jumlah";
                                } else {
                                    $kriteria = $variables[$counter];
                                }
                                $counter++;
                        ?>
                            <tr>
                                <td class="text-center"><?= $kriteria ?></td>
                                <td class="text-center"><?= number_format($value[0], 3) ?></td>
                                <td class="text-center"><?= number_format($value[1], 3) ?></td>
                                <td class="text-center"><?= number_format($value[2], 3) ?></td>
                                <td class="text-center"><?= number_format($value[3], 3) ?></td>
                                <td class="text-center"><?= number_format($value[4], 3) ?></td>
                                <td class="text-center"><?= number_format($value[5], 3) ?></td>
                                <td class="text-center"><?= number_format($value[6], 3) ?></td>
                                <td class="text-center"><?= number_format($value[0], 3) ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="text-center" style="font-weight: bold;">PEV</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center" style="font-weight: bold;"><?= number_format($weight["pev"], 3) ?></td>
                        </tr>
                        <tr>
                            <td class="text-center" style="font-weight: bold;">CI</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center" style="font-weight: bold;"><?= number_format($weight["ci"], 3) ?></td>
                        </tr>
                        <tr>
                            <td class="text-center" style="font-weight: bold;">CR</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center" style="font-weight: bold;"><?= number_format($weight["cr"], 3) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Tahap 1 End -->


<!-- Tahap 2 Start -->
<div class="mb-4 mt-4">
    <h4 class="h4 mb-0 text-gray-800">Tahap 2: Perbandingan Masing Masing Kriteria Berdasarkan Data</h4>
</div>
<div class="row">
    <?php foreach ($variables as $key => $variable) {
        $current_key = strtolower($variable);
    ?>
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $variable ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped tbl-var-comparison" width="100%" style="display: table;"
                        id="tbl-<?= $current_key ?>-comparison">
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <?php 
                                    foreach ($raw_books as $key => $book) {
                                ?>
                                    <th class="text-center"><?= $book["book_code"] ?></th>
                                <?php } ?>
                                <th class="text-center">Priority Vector</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($raw_books as $key => $book) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $book["book_code"] ?></td>
                                    <?php 
                                        foreach ($compared_variable[$current_key]["data"][$book["book_code"]] as $key => $compared_var) {
                                    ?>
                                        <td class="text-center"><?= number_format($compared_var, 3); ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td class="text-center">Jumlah</td>
                                <?php 
                                    foreach (end($compared_variable[$current_key]["data"]) as $key => $compared_var) {
                                ?>
                                    <td class="text-center"><?= number_format($compared_var, 3); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                            <td class="text-center" style="font-weight: bold;">PEV</td>
                            <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center" style="font-weight: bold;"><?= number_format($compared_variable[$current_key]["pev"], 3) ?></td>
                            </tr>
                            <tr>
                                <td class="text-center" style="font-weight: bold;">CI</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center" style="font-weight: bold;"><?= number_format($compared_variable[$current_key]["ci"], 3) ?></td>
                            </tr>
                            <tr>
                                <td class="text-center" style="font-weight: bold;">CR</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center" style="font-weight: bold;"><?= number_format($compared_variable[$current_key]["cr"], 3) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!-- Tahap 2 End -->

<!-- Tahap 3 Start -->
<div class="mb-4 mt-4">
    <h4 class="h4 mb-0 text-gray-800">Tahap 3: Menghitung Total Skor</h4>
</div>
<div class="row">
    <div class="col-xl-7 col-lg-7">
        <div class="card shadow mb-4">

            <!-- Card Header -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Skor Masing Masing Data</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-responsive table-striped" style="display: table;" id="tbl-each-score-data" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Overal Composite Weight</th>
                            <th class="text-center">Weight</th>
                            <?php foreach ($raw_books as $key => $book) {?>
                                <th class="text-center"><?= $book["book_code"] ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($variables as $key => $variable) {
                                $current_variable = strtolower($variable);
                        ?>
                            <tr>
                                <td class="text-center"><?= $variable ?></td>
                                <td class="text-center"><?= number_format(end($weight["data"][$key]), 3) ?></td>
                                <?php 
                                    foreach ($raw_books as $key => $book) {
                                        $pv_book = end($compared_variable[$current_variable]["data"][$book["book_code"]]);
                                ?>
                                    <td class="text-center"><?= number_format($pv_book, 3) ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="text-cemter">Composite Weight</td>
                            <td></td>
                            <?php foreach ($calculated_book as $key => $calc) {?>
                                <td class="text-center"><?= number_format($calc, 3) ?></td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-5 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Header -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-responsive table-striped" style="display: table;" id="tbl-ordering-data" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Book Title</th>
                            <th class="text-center">Book Code</th>
                            <th class="text-center">Rate</th>
                            <th class="text-center">Urutan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ordered_data as $key => $data) {?>
                            <tr>
                                <td class="text-center"><?= $data["book_title"] ?></td>
                                <td class="text-center"><?= $data["book_code"] ?></td>
                                <td class="text-center"><?= number_format($data["rate"], 3) ?></td>
                                <td class="text-center"><?= $data["position"] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- Tahap 3 End -->