    <footer>
        <p>We are Developer</p>
        <div class="social-icons">
            <a href="index.php"><i class="fas fa-home"></i></a>
            <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://sa.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
            <p>&copy; 2022 <span>Bonus Store</span> All Right Reserved</p>
        </div>
    </footer>
    <?php $title;
    if ($title == "Bonus Store")  echo '<script src="JS/Main.js"></script>';
    if ($title == "Login" || $title == "Sign")  echo '<script src="JS/Login.js"></script>';
    if ($title == "Games")  echo '<script src="JS/Games.js"></script>';
    if ($title == "Add Page")  echo '<script src="JS/AddAdmin.js"></script>';
    if ($title == "Edit Page")  echo '<script src="JS/EditAdmin.js"></script>';
    if ($title == "Delete Page")  echo '<script src="JS/deleteAdmin.js"></script>';
    if ($title == "Add Trading" || $title == "Accept")  echo '<script src="JS/Addtrading.js"></script>';
    if ($title == "Add Offer")  echo '<script src="JS/addOffer.js"></script>';
    if ($title == "Delete Offer")  echo '<script src="JS/deleteOffer.js"></script>';
    if ($title == "Cart")  echo '<script src="JS/pdf.js"></script>';
    if ($title == "Rate")  echo '<script src="JS/rate.js"></script>'; ?>

    <script src="JS/Global.js"></script>
    </body>

    </html>