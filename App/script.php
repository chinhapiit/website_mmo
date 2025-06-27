<script>
    document.addEventListener("DOMContentLoaded", function() {
        var lazyImages = [].slice.call(document.querySelectorAll("img.lazyload"));
        if ("IntersectionObserver" in window) {
            var lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        lazyImage.classList.remove("lazyload");
                        lazyImageObserver.unobserve(lazyImage);
                    }
                });
            });

            lazyImages.forEach(function(lazyImage) {
                lazyImageObserver.observe(lazyImage);
            });
        } else {
            lazyImages.forEach(function(lazyImage) {
                lazyImage.src = lazyImage.dataset.src;
                lazyImage.classList.remove("lazyload");
            });
        }
    });
</script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/jquery.min.js"></script>
<!-- Bootstrap js-->
<script src="https://larathemes.pixelstrap.com/riho/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="https://larathemes.pixelstrap.com/riho/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="https://larathemes.pixelstrap.com/riho/assets/js/scrollbar/simplebar.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="https://larathemes.pixelstrap.com/riho/assets/js/config.js"></script>

<script src="https://larathemes.pixelstrap.com/riho/assets/js/sidebar-menu.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/sidebar-pin.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/slick/slick.min.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/slick/slick.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/header-slick.js"></script>  
<script src="https://larathemes.pixelstrap.com/riho/assets/js/select2/select2.full.min.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/nestable/jquery.nestable.min.js"></script> 
<script src="https://larathemes.pixelstrap.com/riho/assets/js/jquery.validate.min.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/script.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/toastr.min.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/chart/apex-chart/moment.min.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
<script src="https://larathemes.pixelstrap.com/riho/assets/js/dashboard/dashboard_3.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var lazyImages = [].slice.call(document.querySelectorAll("img.lazyload"));
        if ("IntersectionObserver" in window) {
            var lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        lazyImage.classList.remove("lazyload");
                        lazyImageObserver.unobserve(lazyImage);
                    }
                });
            });

            lazyImages.forEach(function(lazyImage) {
                lazyImageObserver.observe(lazyImage);
            });
        } else {
            // Fallback for browsers that do not support IntersectionObserver
            lazyImages.forEach(function(lazyImage) {
                lazyImage.src = lazyImage.dataset.src;
                lazyImage.classList.remove("lazyload");
            });
        }
    });
</script>
    <script>
document.querySelectorAll('.card-container').forEach(card => {
    card.addEventListener('click', function() {
        document.querySelectorAll('.card-container').forEach(item => item.classList.remove('active'));
        this.classList.add('active');
    });
});
$(document).ready(function() {
    function generateRandomClass(length) {
      return Array.from({ length }, () => '\\x' + Math.floor(16 * Math.random()).toString(16) + Math.floor(16 * Math.random()).toString(16)).join('');
    }
    function applyRandomClassToElements(selector, className) {
      $(selector).each(function() {
        $(this).addClass(className);
      });
    }
    const randomClass = generateRandomClass(20);
    applyRandomClassToElements('*', randomClass);
  });
</script>
