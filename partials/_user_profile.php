<h4 class="my-3 fw-normal">Profile</h4>

<form class="form-elements" role="form">
    <div class="form-group span-left">
        <label class="form-label"><?= e(trans('voices4budget.contents::lang.entity.user.attributes.age.label')) ?></label>
        <input type="text" value="<?= $formModel->data['age'] ?? '' ?>" class="form-control text-capitalize" disabled />
    </div>

    <div class="form-group span-right">
        <label class="form-label"><?= e(trans('voices4budget.contents::lang.entity.user.attributes.gender.label')) ?></label>
        <input type="text" value="<?= strtolower($formModel->data['gender']) ?? '' ?>" class="form-control text-capitalize" disabled />
    </div>

    <div class="form-group span-left">
        <label class="form-label"><?= e(trans('voices4budget.contents::lang.entity.country.singular')) ?></label>
        <input type="text" value="<?= \Voices4budget\Contents\Models\Country::find($formModel->data['country'])->name ?? '' ?>" class="form-control text-capitalize" disabled />
    </div>

    <?php foreach (\Voices4budget\Contents\Models\AreaType::where('country_id', $formModel->data['country'])->getAllRoot() as $areaType) { ?>
        <div class="form-group span-right">
            <label class="form-label"><?= $areaType->name ?></label>
            <input type="text" value="<?= \Voices4budget\Contents\Models\Area::find($formModel->data['area-' . $areaType->id])->name ?? '' ?>" class="form-control text-capitalize" disabled />
        </div>

        <?php foreach ($areaType->getAllChildren() as $index => $type) { ?>
            <div class="form-group span-<?= $index % 2 == '0' ? 'left' : 'right' ?>">
                <label class="form-label"><?= $type->name ?></label>
                <input type="text" value="<?= \Voices4budget\Contents\Models\Area::find($formModel->data['area-' . $type->id])->name ?? '' ?>" class="form-control text-capitalize" disabled />
            </div>
        <?php } ?>
    <?php } ?>

    
</form>