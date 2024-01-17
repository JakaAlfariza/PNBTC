<script>
   $(document).ready(function () {
        var debounceTimer;
        // inisialisasi by id
        $('#searchQuery').on('input', function () {
            clearTimeout(debounceTimer);

            var query = $(this).val();

            // minimal search 1 char
            if (query.length >= 1) {
                debounceTimer = setTimeout(function () {
                    $.ajax({
                        url: '<?= base_url('chalaman/searchEvent'); ?>',
                        method: 'GET',
                        data: { query: query },
                        success: function (response) {
                            $('#searchDropdown').html(response);
                            $('#searchDropdown').show();
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                        }
                    });
                }, 300);
            } else {
                $('#searchDropdown').hide();
            }
        });

        // Enter = membuka dropdown
        $('#searchQuery').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                $('#searchDropdownButton').click();
            }
        });

        // Dropdown diclick
        $('#searchDropdown').on('click', '.search-result-item', function () {
            var value = $(this).data('value');
            selectSuggestion(value);
        });

        // Click selain dropdown
        $(document).on('click', function (e) {
            if (!$(e.target).closest('#searchDropdown').length && !$(e.target).is('#searchQuery')) {
                $('#searchDropdown').hide();
            }
        });
    });

    // Function pengatur hasil search
    function selectSuggestion(value) {
        $('#searchQuery').val(value);
        $('#searchDropdown').hide();
        $('#searchForm').submit();
    }

    // Function to handle selecting a suggestion from the dropdown
    function selectSuggestion(value) {
        $('#searchQuery').val(value);
        $('#searchDropdown').hide();
        $('#searchForm').submit();
    }


    document.addEventListener('DOMContentLoaded', function () {
        var cards = document.querySelectorAll('.clickable-card');
        var categoryButtons = document.querySelectorAll('.category-filter');

        categoryButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var selectedCategory = this.getAttribute('data-category');

                cards.forEach(function (card) {
                    var cardCategory = card.getAttribute('data-category');

                    if (selectedCategory === 'all' || selectedCategory === cardCategory) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        cards.forEach(function (card) {
            card.addEventListener('click', function () {
                var eventId = this.getAttribute('data-event-id');
                window.location.href = '<?= base_url('cdetail/detailEvent/'); ?>' + eventId;
            });
        });
    });
</script>
