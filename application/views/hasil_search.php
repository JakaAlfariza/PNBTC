<!-- Display search results in a dropdown -->
<div class="dropdown">
    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="searchDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="searchDropdownButton" style="max-height: 200px; overflow-y: auto;">
        <?php if (empty($event)): ?>
            <p class="dropdown-item mb-0 small">Hasil pencarian tidak ditemukan</p>
        <?php else: ?>
            <?php $count = 0; ?>
            <?php foreach ($event as $search_event): ?>
                <?php if ($count < 5): ?>
                    <a class="dropdown-item mb-0" style="padding-left: 5px;" href="<?= base_url('cdetail/detailEvent/' . $search_event->id_event); ?>">
                        <div class="search-result">
                            <img src="<?= base_url('images/' . $search_event->thumbnail); ?>" alt="<?= $search_event->nama_event; ?>" class="search-result-img">
                            <div class="search-result-text">
                                <h6 class="mb-1"><?= $search_event->nama_event; ?></h6>
                                <p class="mb-0 small"><?= $search_event->penyelenggara; ?></p>
                            </div>
                        </div>
                    </a>
                    <?php $count++; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
