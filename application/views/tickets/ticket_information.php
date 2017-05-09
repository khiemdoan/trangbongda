
<div class="col-md-9">

<div class="row">
    <div class="col-sm-4">
        <div class="list-group">
            <a href="#" class="list-group-item active">
                CÁC TRẬN ĐẤU ĐANG CHUẨN BỊ DIỄN RA
            </a>
            <?php
            foreach ($matchs as $match) {
                echo "<a href='" . base_url() . "view/ticket/" . $match['match_id'] . "' class='list-group-item'>" . $match['match_name'] . "</a>";
            }
            ?>
        </div>
    </div><!-- /.col-sm-4 -->
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo "TRẬN ĐẤU " . $match['match_name'] ?></h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nơi Diễn Ra Trận Đấu</th>
                            <th>Số Vé Hiện Có</th>
                            <th>Mô Tả Trận Đấu</th>
                            <th>Thời Gian</th>
                            <th>Kiểu Vé</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tickets as $ticket) {
                            echo "<tr>";
                            echo "<td>" . $ticket['location'] . "</td>";
                            echo "<td>" . $ticket['number'] . "</td>";
                            echo "<td>" . $ticket['description'] . "</td>";
                            echo "<td>" . $ticket['date'] . "</td>";
                            echo "<td>" . $ticket['type'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>