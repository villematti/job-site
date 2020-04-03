<?php
class Job
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllJobs()
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname 
            FROM jobs
            INNER JOIN categories
            ON jobs.category_id = categories.id
            WHERE deleted IS NULL
            ORDER BY created DESC");

        // Assign result set
        $results = $this->db->resultSet();

        return $results;
    }

    public function getLatestJobs()
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname 
            FROM jobs
            INNER JOIN categories
            ON jobs.category_id = categories.id
            WHERE deleted IS NULL
            ORDER BY created DESC
            LIMIT 10");

        // Assign result set
        $results = $this->db->resultSet();

        return $results;
    }

    public function getCategories()
    {
        $this->db->query("SELECT * FROM categories");

        // Assign result set
        $results = $this->db->resultSet();

        return $results;
    }

    public function getJobsByCategory($category)
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname 
            FROM jobs
            INNER JOIN categories
            ON jobs.category_id = categories.id
            WHERE jobs.category_id = $category
            AND jobs.deleted IS NULL
            ORDER BY created DESC");

        // Assign result set
        $results = $this->db->resultSet();

        return $results;
    }

    public function getCategory($id)
    {
        $this->db->query("SELECT * FROM categories WHERE categories.id = $id");

        // Assign result set
        $results = $this->db->single();

        return $results;
    }

    public function getJob($id)
    {
        $this->db->query("SELECT * FROM jobs WHERE jobs.id = $id");

        // Assign result set
        $results = $this->db->single();

        return $results;
    }

    public function create($data)
    {
        $this->db->query("INSERT INTO jobs (category_id, job_title, company, description, location, salary, contact_user, contact_email)
        VALUES (:category_id, :job_title,:company, :description, :location, :salary, :contact_user, :contact_email)");

        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->query("UPDATE jobs
        SET
        deleted = :deleted
        WHERE jobs.id = " . $id);

        $this->db->bind(':deleted', date('Y-m-d H:i:s'));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $this->db->query("UPDATE jobs
        SET
        category_id = :category_id,
        job_title = :job_title,
        company = :company,
        description = :description,
        location = :location,
        salary = :salary,
        contact_email = :contact_email,
        contact_user = :contact_user
        WHERE jobs.id = " . $id);

        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
