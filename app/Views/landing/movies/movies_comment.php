<?php foreach ($comment as $row) : ?>
    <li class="comments__item">
        <div class="comments__autor">
            <img class="comments__avatar" src="<?= base_url('public/users_img') ?>/<?= img_check($row['user_img']); ?>" alt="">
            <span class="comments__name"><?= $row['user_nama']; ?></span>
            <span class="comments__time"><?= $row['created_time']; ?></span>
        </div>
        <p class="comments__text">
            <?= $row['video_komentar']; ?>
        </p>
        <div class="comments__actions">
            <div class="comments__rate">
                <button type="button">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 7.3273V14.6537" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M14.6667 10.9905H7.33333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6857 1H6.31429C3.04762 1 1 3.31208 1 6.58516V15.4148C1 18.6879 3.0381 21 6.31429 21H15.6857C18.9619 21 21 18.6879 21 15.4148V6.58516C21 3.31208 18.9619 1 15.6857 1Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg> 0
                </button>
                <button type="button">0
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.6667 10.9905H7.33333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6857 1H6.31429C3.04762 1 1 3.31208 1 6.58516V15.4148C1 18.6879 3.0381 21 6.31429 21H15.6857C18.9619 21 21 18.6879 21 15.4148V6.58516C21 3.31208 18.9619 1 15.6857 1Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>

            <button type="button">
                <svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'>
                    <polyline points='400 160 464 224 400 288' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                    <path d='M448,224H154C95.24,224,48,273.33,48,332v20' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                </svg>
                <span>Reply</span>
            </button>
        </div>
    </li>
<?php endforeach; ?>

<!-- <li class="comments__item comments__item--answer">
    <div class="comments__autor">
        <img class="comments__avatar" src="base_url('public/public_assets')/img/avatar.svg" alt="">
        <span class="comments__name">Jesse Plemons</span>
        <span class="comments__time">24.08.2021, 16:41</span>
    </div>
    <p class="comments__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    <div class="comments__actions">
        <div class="comments__rate">
            <button type="button"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 7.3273V14.6537" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M14.6667 10.9905H7.33333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6857 1H6.31429C3.04762 1 1 3.31208 1 6.58516V15.4148C1 18.6879 3.0381 21 6.31429 21H15.6857C18.9619 21 21 18.6879 21 15.4148V6.58516C21 3.31208 18.9619 1 15.6857 1Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg> 10</button>

            <button type="button">0 <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.6667 10.9905H7.33333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6857 1H6.31429C3.04762 1 1 3.31208 1 6.58516V15.4148C1 18.6879 3.0381 21 6.31429 21H15.6857C18.9619 21 21 18.6879 21 15.4148V6.58516C21 3.31208 18.9619 1 15.6857 1Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></button>
        </div>
        <button type="button"></button>
    </div>
</li> -->