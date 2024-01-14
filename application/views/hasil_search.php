<!-- Display search results in a dropdown -->
<div class="dropdown">
    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="searchDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="searchDropdownButton">
        <?php foreach ($event as $search_event): ?>
            <a class="dropdown-item" href="#" onclick="selectSuggestion('<?= $search_event->nama_event; ?>')">
                <h6><?= $search_event->nama_event; ?></h6>
                <p><?= $search_event->penyelenggara; ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</div>
