CREATE TABLE users(
    id INT auto_increment NOT NULL,
    name VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(200) NOT NULL,
    email VARCHAR(50) NOT NULL,
    updated_at VARCHAR(100) NOT NULL,
    created_at VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE travels(
    id INT auto_increment NOT NULL,
    name VARCHAR(50) NOT NULL,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(200),
    image_url VARCHAR(200),
    city VARCHAR(50) NOT NULL,
    strat_date Date,
    end_date Date,
    updated_at VARCHAR(100) NOT NULL,
    created_at VARCHAR(100) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(name)
    REFERENCES users(name)
);

CREATE TABLE tags(
    tag_name VARCHAR(50) NOT NULL,
    tag_count INT NOT NULL,
    updated_at VARCHAR(100) NOT NULL,
    created_at VARCHAR(100) NOT NULL,
    PRIMARY KEY(tag_name)
);

CREATE TABLE tags_of_posts(
    id INT NOT NULL,
    tag_name VARCHAR(50) NOT NULL,
    updated_at VARCHAR(100) NOT NULL,
    created_at VARCHAR(100) NOT NULL,
    PRIMARY KEY(id,tag_name),
    FOREIGN KEY (id)
    REFERENCES travels(id),
    FOREIGN KEY (tag_name)
    REFERENCES tags(tag_name)
);

CREATE TABLE comments(
    comment_id INT auto_increment NOT NULL,
    reviewer VARCHAR(50) NOT NULL,
    reviewee VARCHAR(50) NOT NULL,
    comment VARCHAR(400) NOT NULL,
    updated_at VARCHAR(100) NOT NULL,
    created_at VARCHAR(100) NOT NULL,
    PRIMARY KEY(comment_id),
    FOREIGN KEY (reviewer)
    REFERENCES users(name),
    FOREIGN KEY (reviewee)
    REFERENCES users(name)
);

CREATE TABLE likes(
    id INT NOT NULL,
    user_name VARCHAR(50) NOT NULL,
    updated_at VARCHAR(100) NOT NULL,
    created_at VARCHAR(100) NOT NULL,
    PRIMARY KEY(id,user_name)
);
