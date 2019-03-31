<nav aria-label="Page navigation example" style="margin-top: 10px; margin-bottom: 10px;">
    <ul class="pagination justify-content-center">
        <li class="page-item <?php echo ($_GET["page"] - 1 < 1 ? "disabled" : "") ?>">
            <a class="page-link" href="<?php echo $currentPage."?page=".(int)($_GET["page"] - 1) ?>">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

            <?php for ($i = 0; $i < $pageQuantity; $i++) : ?>
                <li class="page-item <?php echo ($i+1 == $_GET["page"] ? "disabled" : "") ?> "><a class="page-link" href="<?php echo $currentPage."?page=".(int)($i + 1) ?>"><?php echo (int)($i + 1) ?></a></li>
            <?php endfor; ?>


        <li class="page-item <?php echo ($_GET["page"] + 1 > $pageQuantity ? disabled : "") ?>">
            <a class="page-link" href="<?php echo $currentPage."?page=".(int)($_GET["page"] + 1) ?>">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>