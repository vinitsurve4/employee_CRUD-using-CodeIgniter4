CREATE TABLE `employee` (
    `eid` INT AUTO_INCREMENT PRIMARY KEY,
    `fname` VARCHAR(50) NOT NULL,
    `mname` VARCHAR(50),
    `lname` VARCHAR(50) NOT NULL,
    `gender` ENUM('male', 'female') NOT NULL,
    `email` VARCHAR(100) UNIQUE NOT NULL,
    `mobile_no` VARCHAR(15) NOT NULL,
    `date_of_birth` DATE NOT NULL,
    `photograph` VARCHAR(255),
    `status` TINYINT(1) DEFAULT 1
);

CREATE TABLE `address` (
    `aid` INT AUTO_INCREMENT PRIMARY KEY,
    `employee_id` INT NOT NULL,
    `add_line1` VARCHAR(255) NOT NULL,
    `add_line2` VARCHAR(255),
    `country` VARCHAR(50) NOT NULL,
    `state` VARCHAR(50) NOT NULL,
    `pincode` VARCHAR(10) NOT NULL,
    FOREIGN KEY (`employee_id`) REFERENCES `employee`(`eid`) ON DELETE CASCADE
);
