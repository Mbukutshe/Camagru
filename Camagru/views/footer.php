    </div>
    <div class = "footer">
    <p class = "footer-text">&copy;Camagru 2019</p>
    </div>
    </section>
    <?php
        if ($_SERVER['PHP_SELF'] == '/camagru/views/home.php')
            echo '<script type="text/javascript" src="../includes/scripts/gallery.js"></script>';
        else
            if ($_SERVER['PHP_SELF'] == '/camagru/views/editor.php')
            echo '<script type="text/javascript" src="../includes/scripts/declarations.js"></script>
            <script type="text/javascript" src="../includes/scripts/script.js"></script>';
    ?>
</body>
</html>