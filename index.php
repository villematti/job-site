<?php
include_once 'config/init.php';

$job = new Job;

$template = new Template('templates/frontpage.php');

$category = isset($_GET['category']) ? $_GET['category'] : null;

if ($category) {
    $template->jobs = $job->getJobsByCategory($category);
    $template->title = "Jobs in " . $job->getCategory($category)->name;
} else {
    $template->jobs = $job->getLatestJobs();
    $template->title = "Latest Jobs!";
}

$template->categories = $job->getCategories();

echo $template;
