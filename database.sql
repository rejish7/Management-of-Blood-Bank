-- ===============================================
-- Blood Bank Management System Database
-- Database Name: blood_donation
-- Created for Blood Bank & Donation Management
-- ===============================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Create database
CREATE DATABASE IF NOT EXISTS `blood_donation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blood_donation`;

-- ===============================================
-- Table structure for blood types
-- ===============================================

CREATE TABLE `blood` (
  `blood_id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_group` varchar(10) NOT NULL,
  PRIMARY KEY (`blood_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert blood group data
INSERT INTO `blood` (`blood_id`, `blood_group`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- ===============================================
-- Table structure for admin information
-- ===============================================

CREATE TABLE `admin_info` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL UNIQUE,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_phone` varchar(15) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin data
INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_email`, `admin_phone`) VALUES
(1, 'Super Admin', 'admin', 'admin123', 'admin@bloodbank.com', '1234567890');

-- ===============================================
-- Table structure for donor details
-- ===============================================

CREATE TABLE `donor_details` (
  `donor_id` int(11) NOT NULL AUTO_INCREMENT,
  `donor_name` varchar(100) NOT NULL,
  `donor_number` varchar(15) NOT NULL,
  `donor_mail` varchar(100) DEFAULT NULL,
  `donor_age` int(3) NOT NULL,
  `donor_gender` enum('Male','Female','Other') NOT NULL,
  `donor_blood` int(11) NOT NULL,
  `donor_address` text NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`donor_id`),
  KEY `fk_donor_blood` (`donor_blood`),
  CONSTRAINT `fk_donor_blood` FOREIGN KEY (`donor_blood`) REFERENCES `blood` (`blood_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample donor data
INSERT INTO `donor_details` (`donor_id`, `donor_name`, `donor_number`, `donor_mail`, `donor_age`, `donor_gender`, `donor_blood`, `donor_address`) VALUES
(1, 'John Smith', '9876543210', 'john.smith@email.com', 28, 'Male', 1, '123 Main Street, City, State - 12345'),
(2, 'Sarah Johnson', '8765432109', 'sarah.johnson@email.com', 32, 'Female', 2, '456 Oak Avenue, City, State - 12346'),
(3, 'Michael Brown', '7654321098', 'michael.brown@email.com', 25, 'Male', 7, '789 Pine Street, City, State - 12347'),
(4, 'Emily Davis', '6543210987', 'emily.davis@email.com', 29, 'Female', 3, '321 Elm Drive, City, State - 12348'),
(5, 'David Wilson', '5432109876', 'david.wilson@email.com', 35, 'Male', 8, '654 Cedar Lane, City, State - 12349');

-- ===============================================
-- Table structure for contact queries
-- ===============================================

CREATE TABLE `contact_query` (
  `query_id` int(11) NOT NULL AUTO_INCREMENT,
  `query_name` varchar(100) NOT NULL,
  `query_mail` varchar(100) NOT NULL,
  `query_number` varchar(15) NOT NULL,
  `query_message` text NOT NULL,
  `query_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `query_status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=Read, 2=Pending',
  PRIMARY KEY (`query_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample contact query data
INSERT INTO `contact_query` (`query_id`, `query_name`, `query_mail`, `query_number`, `query_message`, `query_status`) VALUES
(1, 'Hospital Admin', 'hospital@example.com', '9999888877', 'We need urgent blood donation for emergency surgeries. Please contact us.', 2),
(2, 'Medical Center', 'medcenter@example.com', '8888777766', 'Looking for regular blood donors for our thalassemia patients.', 1),
(3, 'Red Cross Society', 'redcross@example.com', '7777666655', 'Organizing blood donation camp next month. Need support.', 2);

-- ===============================================
-- Table structure for contact information
-- ===============================================

CREATE TABLE `contact_info` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_address` text NOT NULL,
  `contact_mail` varchar(100) NOT NULL,
  `contact_phone` varchar(15) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert contact information
INSERT INTO `contact_info` (`contact_id`, `contact_address`, `contact_mail`, `contact_phone`) VALUES
(1, 'Blood Bank & Donation Center\n123 Healthcare Avenue\nMedical District, City - 560001\nState, Country', 'info@bloodbank.com', '+1-234-567-8900');

-- ===============================================
-- Table structure for pages content
-- ===============================================

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_type` varchar(50) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `page_data` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `page_type` (`page_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert page content data
INSERT INTO `pages` (`page_id`, `page_type`, `page_name`, `page_data`) VALUES
(1, 'aboutus', 'About Us', 'Welcome to our Blood Bank & Donation Management System. We are a dedicated organization committed to saving lives through efficient blood donation and distribution services.\n\nOur mission is to ensure adequate blood supply for all medical emergencies and routine medical procedures. We maintain the highest standards of safety and quality in blood collection, testing, processing, and distribution.\n\nEstablished with the vision of creating a robust blood donation network, we work tirelessly to connect voluntary blood donors with those in need. Our state-of-the-art facilities and experienced medical professionals ensure that every unit of blood collected meets international safety standards.\n\nWe believe that every donation is a gift of life, and we are honored to facilitate this noble cause.'),

(2, 'donor', 'Why Donate Blood', 'Blood donation is one of the most valuable contributions you can make to your community. Here are compelling reasons why you should consider becoming a blood donor:\n\n<strong>Save Lives:</strong> Each blood donation can save up to three lives. Your single act of generosity can make a significant difference for patients undergoing surgeries, cancer treatments, or recovering from traumatic injuries.\n\n<strong>Health Benefits:</strong> Regular blood donation has several health benefits including reduced risk of heart disease, improved circulation, and enhanced production of new blood cells.\n\n<strong>Free Health Checkup:</strong> Before donation, we conduct comprehensive health screenings including blood pressure, pulse, temperature, and hemoglobin checks - absolutely free.\n\n<strong>Community Service:</strong> Donating blood is a simple way to give back to your community and help fellow human beings in their time of need.\n\n<strong>Quick and Safe:</strong> The entire donation process takes only 8-10 minutes, and all equipment is sterile and single-use only.\n\nJoin our community of life-savers today!'),

(3, 'needforblood', 'The Need for Blood', 'Blood is essential for life, and the need for safe blood and blood products is universal. Here are key facts about blood requirements:\n\n<strong>Daily Demand:</strong> Hospitals require blood every day for surgeries, cancer treatment, chronic illnesses, and traumatic injuries. The demand never stops.\n\n<strong>Short Shelf Life:</strong> Different blood components have varying shelf lives - red blood cells can be stored for up to 42 days, platelets for only 5 days, and plasma up to one year when frozen.\n\n<strong>Emergency Situations:</strong> Natural disasters, accidents, and medical emergencies can create sudden spikes in blood demand that require immediate response.\n\n<strong>Regular Patients:</strong> Patients with conditions like thalassemia, sickle cell disease, and cancer require regular blood transfusions as part of their treatment.\n\n<strong>Surgical Procedures:</strong> Major surgeries, organ transplants, and cardiac procedures often require multiple units of blood.\n\nYour donation today could be someone\'s lifeline tomorrow. Every 2 seconds, someone needs blood.'),

(4, 'bloodtips', 'Blood Tips', 'Before Donating Blood:\n\n• Get plenty of sleep the night before\n• Eat a healthy meal before donating\n• Drink plenty of water and fluids\n• Avoid alcohol 24 hours before donation\n• Bring a valid ID and donor card\n• Wear clothing with sleeves that can be rolled up\n\nAfter Donating Blood:\n\n• Rest for 10-15 minutes after donation\n• Drink extra fluids for the next 24 hours\n• Avoid strenuous activities for 24 hours\n• Keep the bandage on for 4-6 hours\n• Eat iron-rich foods to replenish your blood\n• If you feel dizzy, sit down immediately\n\nGeneral Tips:\n\n• Donate blood every 3-4 months if eligible\n• Maintain a healthy lifestyle\n• Regular donors should take iron supplements\n• Report any post-donation symptoms to medical staff\n• Encourage friends and family to donate'),

(5, 'whoyouhelp', 'Who You Could Help', 'Your blood donation can help a wide variety of patients in need:\n\n<strong>Accident Victims:</strong> People injured in car accidents, natural disasters, or other emergencies often need blood transfusions to replace blood lost due to trauma.\n\n<strong>Cancer Patients:</strong> Many cancer patients need blood during their treatment due to the effects of chemotherapy and radiation on their blood-producing bone marrow.\n\n<strong>Surgery Patients:</strong> Patients undergoing major surgeries, organ transplants, heart surgery, and other complex medical procedures may require blood transfusions.\n\n<strong>Chronic Disease Patients:</strong> People with diseases like sickle cell anemia, thalassemia, and other blood disorders need regular transfusions to survive.\n\n<strong>New Mothers:</strong> Women experiencing complications during childbirth may need blood transfusions to save both mother and baby.\n\n<strong>Premature Babies:</strong> Premature infants often need blood transfusions due to various medical complications.\n\nYour one donation can help multiple patients, making you a hero to families you may never meet.'),

(6, 'bloodgroups', 'Blood Groups', 'Understanding blood groups is crucial for safe blood transfusions:\n\n<strong>ABO Blood Group System:</strong>\n• Type A: Has A antigens, can donate to A and AB\n• Type B: Has B antigens, can donate to B and AB\n• Type AB: Has both A and B antigens, universal plasma donor\n• Type O: Has no antigens, universal red cell donor\n\n<strong>Rh Factor:</strong>\n• Rh Positive (+): Has Rh antigens\n• Rh Negative (-): Does not have Rh antigens\n\n<strong>Compatibility:</strong>\nBlood transfusions must be compatible between donor and recipient. Incompatible blood can cause serious, life-threatening reactions.\n\n<strong>Distribution:</strong>\n• O+ is the most common blood type (38% of population)\n• AB- is the rarest blood type (0.6% of population)\n• Each blood type is vital for the community\n\nKnowing your blood type helps medical professionals provide faster, safer treatment in emergencies.'),

(7, 'universal', 'Universal Donors and Recipients', '<strong>Universal Blood Donors (O Negative):</strong>\n\nPeople with O negative blood are called universal donors because their red blood cells can be given to people of any blood type. This makes O negative blood extremely valuable in emergency situations when there is no time to determine the patient\'s blood type.\n\n<strong>Key Facts about O Negative:</strong>\n• Only 6.6% of the population has O negative blood\n• O negative donors can only receive O negative blood\n• Their blood is often used in emergency situations\n• Hospitals always need O negative blood in stock\n\n<strong>Universal Plasma Donors (AB):</strong>\n\nPeople with AB blood type are universal plasma donors. Their plasma can be given to anyone regardless of blood type.\n\n<strong>Universal Recipients (AB Positive):</strong>\n\nPeople with AB positive blood can receive red blood cells from any blood type, making them universal recipients for red blood cells.\n\n<strong>The Critical Need:</strong>\n\nUniversal donors are always in high demand because their blood can help the most people. If you have O negative blood, your donations are especially precious and can save lives in critical situations where every second counts.');

-- ===============================================
-- Indexes for better performance
-- ===============================================

-- Add indexes for frequently searched columns
ALTER TABLE `donor_details` ADD INDEX `idx_blood_type` (`donor_blood`);
ALTER TABLE `donor_details` ADD INDEX `idx_registration_date` (`registration_date`);
ALTER TABLE `contact_query` ADD INDEX `idx_query_status` (`query_status`);
ALTER TABLE `contact_query` ADD INDEX `idx_query_date` (`query_date`);

-- ===============================================
-- Auto increment values
-- ===============================================

ALTER TABLE `blood` AUTO_INCREMENT = 9;
ALTER TABLE `admin_info` AUTO_INCREMENT = 2;
ALTER TABLE `donor_details` AUTO_INCREMENT = 6;
ALTER TABLE `contact_query` AUTO_INCREMENT = 4;
ALTER TABLE `contact_info` AUTO_INCREMENT = 2;
ALTER TABLE `pages` AUTO_INCREMENT = 8;

COMMIT;

-- ===============================================
-- End of Blood Bank Management System Database
-- ===============================================
