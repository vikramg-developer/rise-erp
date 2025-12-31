<?php

if (!function_exists('activityBadge')) {

    function activityBadge($type, $name, $date, $msg = ''): string {
        return '<div class="text-center">
                    <span class="badge bg-' . $type . '-transparent px-3 py-2 fw-semibold" style="font-size:0.8rem">
                        <i class="ri-user-add-line me-1"></i>
                            ' . $msg . " " . (esc($name) ?? '') . '
                    </span>
                    <div class="small text-muted mt-1">
                        <i class="ri-time-line me-1"></i>
                            ' . date('d M Y, h:i:s A', strtotime($date)) . '
                    </div>
                </div>';
    }

}

if (!function_exists('actionButton')) {

    function actionButton($title = '', $data = []): string {

        if ($title === 'Edit') {
            $func = 'edit';
            $btn_class = 'btn-secondary';
            $tooltip_class = 'tooltip-secondary';
            $icon = '<i class="ri-pencil-fill"></i>';
        } else if ($title === 'Delete') {
            $func = 'delete';
            $btn_class = 'btn-danger';
            $tooltip_class = 'tooltip-danger';
            $icon = '<i class="ri-delete-bin-fill"></i>';
        } else if ($title === 'Revert') {
            $func = 'revert';
            $btn_class = 'btn-warning';
            $tooltip_class = 'tooltip-warning';
            $icon = '<i class="ri-arrow-go-back-fill"></i>';
        }
        else if ($title === 'Approve') {
            $func = 'approve';
            $btn_class = 'btn-success';
            $tooltip_class = 'tooltip-success';
            $icon = '<i class="ri-check-line"></i>';
        }
        else if ($title === 'Reject') {
            $func = 'reject';
            $btn_class = 'btn-danger';
            $tooltip_class = 'tooltip-danger';
            $icon = '<i class="ri-close-fill"></i>';
        }
        

        $attributes = '';

        foreach ($data ?? [] as $key => $value) {
            $attributes .= ' data-' . esc($key) . '="' . esc($value) . '"';
        }
        return '<button class="btn btn-icon btn-sm ' . $btn_class . ' btn-wave rounded-pill ' . $func . '" '
                . 'data-bs-toggle="tooltip" data-bs-custom-class="' . $tooltip_class . '" data-bs-placement="top" '
                . 'title="' . $title . '" '
                . $attributes
                . '>' . $icon . '</button> ';
    }

}

if (!function_exists('actionHrefButton')) {

    function actionHrefButton($title = '', $href = ''): string {

        if ($title === 'Edit') {
            $btn_class = 'btn-secondary';
            $tooltip_class = 'tooltip-secondary';
            $icon = '<i class="ri-pencil-fill"></i>';
        } else if ($title === 'Delete') {
            $btn_class = 'btn-danger';
            $tooltip_class = 'tooltip-danger';
            $icon = '<i class="ri-delete-bin-fill"></i>';
        } else if ($title === 'Revert') {
            $btn_class = 'btn-warning';
            $tooltip_class = 'tooltip-warning';
            $icon = '<i class="ri-arrow-go-back-fill"></i>';
        }
        else if ($title === 'Approve') {
            $btn_class = 'btn-success';
            $tooltip_class = 'tooltip-success';
            $icon = '<i class="ri-check-line"></i>';
        }
        else if ($title === 'Reject') {
            $btn_class = 'btn-danger';
            $tooltip_class = 'tooltip-danger';
            $icon = '<i class="ri-close-fill"></i>';
        }

        return '<a href="' . $href . '" class="btn btn-icon btn-sm ' . $btn_class . ' btn-wave rounded-pill" '
                . 'data-bs-toggle="tooltip" data-bs-custom-class="' . $tooltip_class . '" data-bs-placement="top" '
                . 'title="' . $title . '">'
                . $icon . '</a> ';
    }

}
