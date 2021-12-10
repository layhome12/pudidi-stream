<div class="row">
    <div class="col-md-12">
        <div class="row mt-2">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="menu_landing_nama">Nama Menu</label>
                    <input type="hidden" name="menu_landing_id" value="<?= isset($menu_management['menu_landing_id']) ? $menu_management['menu_landing_id'] : ''; ?>">
                    <input type="text" class="form-control" name="menu_landing_nama" id="menu_landing_nama" value="<?= isset($menu_management['menu_landing_nama']) ? $menu_management['menu_landing_nama'] : '' ?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="menu_landing_parent">Tipe</label>
                    <select class="form-control select2" name="menu_landing_parent" id="menu_landing_parent" style="width: 100%;" required>
                        <option value="0" <?= isset($menu_management['menu_landing_parent']) && $menu_management['menu_landing_parent'] == 0 ? 'selected' : '' ?>>Parent</option>
                        <?php new \App\Libraries\SelectBuilder([
                            'table' => 'menu_landing',
                            'val_id' => 'menu_landing_id',
                            'val_text' => 'menu_landing_nama',
                            'where' => ['menu_landing_parent' => 0],
                            'id' => isset($menu_management['menu_landing_parent']) ? $menu_management['menu_landing_parent'] : 0
                        ]); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="menu_landing_link">Link</label>
                    <input type="text" class="form-control" name="menu_landing_link" id="menu_landing_link" value="<?= isset($menu_management['menu_landing_link']) ? $menu_management['menu_landing_link'] : '' ?>" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="menu_landing_link">Urutan</label>
                    <input type="number" class="form-control" name="menu_landing_urutan" id="menu_landing_urutan" value="<?= isset($menu_management['menu_landing_urutan']) ? $menu_management['menu_landing_urutan'] : '' ?>" required>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.select2').select2();
</script>