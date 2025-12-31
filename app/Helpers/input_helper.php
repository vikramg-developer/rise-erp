<?php

/**
 * ==========================================
 * INPUT HELPER (CI4)
 * ==========================================
 * Uses existing clean_* helpers
 * Adds uppercase + safety
 */

if (!function_exists('uppercase_name')) {
    /**
     * Clean + uppercase person names
     */
    function uppercase_name(?string $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }
        // Reuse existing project helper
        $value = clean_name($value);

        return strtoupper($value);
    }
}

if (!function_exists('uppercase_pan')) {
    /**
     * PAN number uppercase
     */
    function uppercase_pan(?string $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }
        return strtoupper(trim($value));
    }
}

if (!function_exists('numeric_only')) {
    /**
     * Allow only numbers, optional max length
     */
    function numeric_only(?string $value, int $length = null): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }
        $value = preg_replace('/[^0-9]/', '', $value);

        if ($length !== null) {
            $value = substr($value, 0, $length);
        }
        return $value;
    }
}

if (!function_exists('cleanemail')) {
    /**
     * Clean email (wrapper for existing helper)
     */
    function clean_email_safe(?string $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        return clean_email(trim($value));
    }
}
