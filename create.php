<?php
include_once 'config/init.php';

$job = new Job;

if (isset($_POST['submit'])) {
    $data = array();
    $data['job_title'] = $_POST['job_title'];
    $data['company'] = $_POST['company'];
    $data['category_id'] = $_POST['category_id'];
    $data['description'] = $_POST['description'];
    $data['location'] = $_POST['location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];

    if ($job->create($data)) {
        redirect('index.php', 'Your job was posted successfully!', 'success');
    } else {
        redirect('index.php', 'Something went wrong!', 'error');
    }
}

$template = new Template('templates/job_create.php');

$template->categories = $job->getCategories();

echo $template;
