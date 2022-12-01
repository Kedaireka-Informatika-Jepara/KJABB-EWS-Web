<main>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Weights</h1>
<p class="mb-4"><a target="_blank" href="https://datatables.net"></a></p>

<!-- /.container-fluid -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row mb-3">
            <form class="redirect form-inline" method="post" action="<?= base_url('Admin/Dataweight/redirect'); ?>">
                <div class="form-group">
                    <label class="col-form-label" for="redirect">Type of Parameters:</label>
                    <select name="redirect" id="redirect" class="form-control ml-2 mr-sm-2">
                        <option value="index">Index Biotic</option>
                        <option value="main">Main Abiotic</option>
                        <option value="add">Additional Abiotic</option>
                    </select>
                    <button type="submit" class="btn btn-light mx-auto ml-2" value="redirect">Detail</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</main>