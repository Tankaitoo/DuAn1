<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {
?>

    <footer class="py-4" style="background-color: #e3f2fd; color: #333;">
        <div class="container text-center">
            <p class="mb-1">Liên hệ với chúng tôi: 123-456-789 | Email: <a href="mailto:Kenzie@cuahangphukien.com" class="text-dark">Kenzie@cuahangphukien.com</a></p>
            <p class="small">&copy; 2024 Cửa hàng phụ kiện điện tử. Tất cả quyền được bảo lưu.</p>
            <div class="social-links mt-3">
                <a href="#" class="text-dark mx-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-dark mx-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-dark mx-2"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap và các thư viện JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Font Awesome Icons -->

</body>
</html>

<?php
    }
}
?>
