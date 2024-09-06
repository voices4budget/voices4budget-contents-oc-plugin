<style>
    @media print {
        body {
            visibility: hidden;
        }

        #printable {
            visibility: visible;
            position: absolute;
            left: 0;
            top: 0;
            font-family: Arial, Helvetica, sans-serif;

            #resultHeader table {
                border: 0px solid #000 !important;
            }

            #resultHeader td {
                border: 0px solid #000 !important;
            }
            
            #resultBody th, #resultBody td {
                color: #000;
                border: 1px solid #000 !important;
                word-wrap: break-word;
            }

            .stakeholder {
                break-inside: avoid;
                color: #000;

                h6 {
                    color: #000;
                }
            }
        }
    }
</style>

<form class="form-elements" role="form">
    <div class="form-group span-left">
        <label><?= e(trans('voices4budget.contents::lang.entity.country.singular')) ?></label>
        <select class="form-control custom-select" name="country_id" data-request="onChangeCountry" data-request-update="{'voting_sessions': '#voting_session' }" data-request-success="$('#toggleCollapse').prop('disabled', false)">
            <option value="">-- <?= e(trans('voices4budget.contents::lang.entity.voteresult.messages.choose_country')) ?> --</option>
            <?php foreach ($countries as $country) { ?>
                <option value="<?= $country->id ?>"><?= $country->name ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group span-right" id="voting_session">
        <label><?= e(trans('voices4budget.contents::lang.entity.votingsession.singular')) ?></label>
        <select class="form-control custom-select" name="session_id" data-request="onChangeSession"
            data-request-update="{'categories': '#resultRows', 'signatures': '#signature_section' }"
            data-request-success="$('#toggleCollapse').prop('disabled', false)">
            <option value="">-- <?= e(trans('voices4budget.contents::lang.entity.voteresult.messages.choose_voting_session')) ?> --</option>
        </select>
    </div>
</form>

<div class="control-toolbar">
    <div class="toolbar-item toolbar-primary">
        <div data-control="toolbar">
            <button type="button" class="btn btn-primary oc-icon-print" onclick="window.print()"> <?= e(trans('voices4budget.contents::lang.entity.voteresult.actions.print')) ?></button>
        </div>
    </div>
</div>

<hr class="mb-4" />

<div id="printable">
    <div id="resultHeader" class="mb-5">

    </div>

    <div class="control-list">
        <table id="resultBody" class="table table-bordered data">
            <thead>
                <tr>
                    <th class="p-3 border-start border-end" rowspan="2" valign="middle"><?= e(trans('voices4budget.contents::lang.entity.category.singular')) ?></th>
                    <th class="p-3 border-start border-end" rowspan="2" valign="middle"><?= e(trans('voices4budget.contents::lang.entity.voteresult.attributes.rank')) ?></th>
                    <th class="p-3 border-start border-end" rowspan="2" valign="middle"><?= e(trans('voices4budget.contents::lang.entity.program.singular')) ?></th>
                    <th class="p-3 border-start border-end" rowspan="2" valign="middle"><?= e(trans('voices4budget.contents::lang.entity.voteresult.attributes.total_votes')) ?></th>
                    <th class="p-3 border-start border-end text-center" colspan="<?= count($age_ranges) ?>"><?= e(trans('voices4budget.contents::lang.entity.user.attributes.gender.label')) ?></th>
                    <th class="p-3 border-start border-end text-center" colspan="<?= count($genders) ?>"><?= e(trans('voices4budget.contents::lang.entity.user.attributes.age.label')) ?></th>
                    <th class="p-3 border-start border-end text-center" colspan="<?= count($villages) ?>"><?= $areaType->name ?></th>
                </tr>
                <tr>
                    <?php foreach ($age_ranges as $range) { ?>
                        <th valign="middle" class="p-3 text-capitalize border-start border-end text-center"><?= strtolower($range) ?> </th>
                    <?php } ?>
                    <?php foreach ($genders as $gender) { ?>
                        <th valign="middle" class="p-3 text-capitalize border-start border-end text-center"><?= strtolower($gender) ?> </th>
                    <?php } ?>
                    <?php foreach ($villages as $village) { ?>
                        <th valign="middle" class="p-3 text-capitalize border-start border-end text-center text-wrap"><?= strtolower($village->name) ?> </th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody id="resultRows">
                <tr class="no-data">
                    <td colspan="100" class="nolink">
                        <p class="no-data">
                        <?= e(trans('voices4budget.contents::lang.entity.voteresult.messages.no_data')) ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="signature_section" class="my-5 container-fluid">
        
    </div>
</div>

