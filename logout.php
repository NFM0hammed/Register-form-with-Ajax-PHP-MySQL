<?php

    // Start of session
    session_start();

    // Unset of data
    session_unset();

    // Destroy the session
    session_destroy();

    // Redierct to the register page
    header("Location: index.php");