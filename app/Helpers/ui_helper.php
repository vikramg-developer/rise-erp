<?php

function activityBadge($type, $name, $date, $msg='') {
    return '<div class="text-center">
                                    <span class="badge bg-'.$type.'-transparent px-3 py-2 fw-semibold" style="font-size:0.8rem">
                                        <i class="ri-user-add-line me-1"></i>
                                        ' .$msg." ". ($name ?? '') . '
                                    </span>
                                    <div class="small text-muted mt-1">
                                        <i class="ri-time-line me-1"></i>
                                        ' . date('d M Y, h:i:s A', strtotime($date)) . '
                                    </div>
                                </div>';
}
