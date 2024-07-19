
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Danh sách bình luận sản phẩm</h3>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Sản phẩm bình luận</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_cmt as $comment): ?>
                            <?php extract($comment); ?>
                            <tr>
                                <th scope="row">
                                    <?= $ma_sp ?>
                                </th>
                                <td>
                                    <?= $ten_sp ?>
                                </td>
                                <td>
                                    <?= $soluong ?>
                                </td>
                                <td>
                                    <a href="?act=detail_cmt&id_cmt=<?= $ma_sp?>" class="btn btn-primary">Xem chi tiết</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>