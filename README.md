## Create tables

### jobs

```
CREATE TABLE jobs (
    id INT IDENTITY(1,1) PRIMARY KEY,
    category_id INT NOT NULL, 
    company NVARCHAR( 255 ) NOT NULL, 
    job_title NVARCHAR( 255 ) NOT NULL,
    description NVARCHAR( 255 ) NOT NULL, 
    salary NVARCHAR( 255 ) NOT NULL, 
    location NVARCHAR( 255 ) NOT NULL, 
    contact_user NVARCHAR( 255 ) NOT NULL,
    contact_email NVARCHAR( 255 ) NOT NULL,
    created datetime NOT NULL,
    deleted datetime
)
```

### categories

```
CREATE TABLE categories (
    id INT IDENTITY(1,1) PRIMARY KEY,
    name NVARCHAR( 255 ) NOT NULL)
```