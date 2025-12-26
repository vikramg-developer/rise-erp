<?php

function current_user(): ?string
{
    return session('rise_no');   // adjust based on your login system
}
