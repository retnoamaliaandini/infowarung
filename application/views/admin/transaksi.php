<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container">
        <div class="laporanstok-header row">
            <div class="col-md-2 laporanstok-title">
                <h2 class="dashboard-title">Transaksi</h2>
            </div>
            <div class="col-md-10 laporanstok-date">
                <button type="button" class="btn btn-dark transaksi-add-btn">+</button>
            </div>
        </div>
        <div class="laporan-stok-section">
            <table class="table laporan-stok-table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Item</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12345</td>
                        <td>Mentega</td>
                        <td>5</td>
                        <td>Rp 2.000</td>
                        <td>Rp 10.000</td>
                    </tr>
                    <tr>
                        <td>12346</td>
                        <td>Mentega</td>
                        <td>5</td>
                        <td>Rp 2.000</td>
                        <td>Rp 10.000</td>
                    </tr>
                    <tr>
                        <td>12347</td>
                        <td>Mentega</td>
                        <td>5</td>
                        <td>Rp 2.000</td>
                        <td>Rp 10.000</td>
                    </tr>
                    <tr class="transaksi-total-section" style="border:none;">
                        <td colspan="4" class="transaksi-total-text" style="border:none;">&emsp;&emsp;
                        TOTAL</td>
                        <td style="border:none;font-weight:bold;">Rp 30.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="stok-produk-update">
            <button type="button" class="btn btn-dark stok-update-btn transaksi-simpan-btn">Simpan</button>
        </div>   
    </div>
</main>
<!--Main layout-->

<!--JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>