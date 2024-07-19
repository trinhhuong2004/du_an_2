<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Chi tiết bình luận</h3>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Người bình luận</th>
                            <th scope="col">Ngày bình luận</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $step = 0;
                        foreach ($list_cmt_detail as $comment): ?>
                            <?php extract($comment); ?>
                            <tr>
                                <th scope="row">
                                    <?= $step+= 1; ?>
                                </th>
                                <td>
                                    <?= $noi_dung ?>
                                </td>
                                <td>
                                    <?=$ho_ten?>
                                </td>
                                <td>
                                    <?= $ngay_bl?>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có muốn xoá không?')" href="index.php?act=delete_cmt&id_cmt=<?=$ma_bl?>" class="btn btn-danger">Xoá</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>