@extends('layouts.app')
<div class="container-fluid">
    <div class="row vw-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <table id="product-table" class="table table-sm table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Peanut Butter</td>
                            <td>10</td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Peanut Butter Chocolate</td>
                            <td>5</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Peanut Butter Chocolate Cake</td>
                            <td>3</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Peanut Butter Chocolate Cake with Kool-aid</td>
                            <td>2</td>
                            <td>150</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(function () {
        $('#product-table').DataTable({
            processing: true,
            serverSide: false
        });
    });

</script>