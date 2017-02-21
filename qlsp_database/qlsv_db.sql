
CREATE TABLE IF NOT EXISTS `tb_sinhvien` (
  `sv_id` int(11) NOT NULL AUTO_INCREMENT,
  `sv_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_sex` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sv_birthday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_sinhvien`
--

INSERT INTO `tb_sinhvien` (`sv_id`, `sv_name`, `sv_sex`, `sv_birthday`) VALUES
(1, 'Nguy?n V?n C??ng', 'Nam', '20-11-2015'),
(2, '??ng Hoàng Ch??ng', 'Nam', '10-12-2014'),
(3, 'Nguy?n Phú C??ng', 'Nam', '30-01-1990'),
(4, 'Nguy?n Th? Th?p', 'N?', '20-11-2011');