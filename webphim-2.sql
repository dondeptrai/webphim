-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2024 lúc 08:44 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webphim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(255) NOT NULL,
  `date_comment` datetime NOT NULL DEFAULT current_timestamp(),
  `article` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsuxemphim`
--

CREATE TABLE `lichsuxemphim` (
  `malichsu` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `idPhim` int(11) NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsuxemphim`
--

INSERT INTO `lichsuxemphim` (`malichsu`, `id`, `idPhim`, `thoigian`) VALUES
(1, 10, 1, '2024-03-13 06:17:21'),
(4, 10, 6, '2024-03-13 06:24:15'),
(5, 10, 5, '2024-03-13 06:23:02'),
(6, 10, 8, '2024-03-13 20:07:10'),
(7, 11, 1, '2024-03-13 20:07:35'),
(8, 1, 1, '2024-03-25 11:50:23'),
(9, 13, 1, '2024-03-18 00:33:20'),
(10, 13, 20, '2024-03-25 10:19:47'),
(11, 13, 12, '2024-03-25 10:47:59'),
(12, 1, 3, '2024-03-25 11:50:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `maPhim` int(11) NOT NULL,
  `Ten` varchar(300) NOT NULL,
  `Quoc_Gia` varchar(100) NOT NULL,
  `MaTheloai` int(11) NOT NULL,
  `Phan_Loai` varchar(100) DEFAULT NULL,
  `Dien_Vien` varchar(300) NOT NULL,
  `Nam` int(11) NOT NULL,
  `Thoi_Luong` varchar(100) NOT NULL,
  `Noi_Dung` varchar(2000) NOT NULL,
  `Ngon_Ngu` varchar(100) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `trailerlink` varchar(1000) NOT NULL,
  `linkphim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`maPhim`, `Ten`, `Quoc_Gia`, `MaTheloai`, `Phan_Loai`, `Dien_Vien`, `Nam`, `Thoi_Luong`, `Noi_Dung`, `Ngon_Ngu`, `hinhanh`, `trailerlink`, `linkphim`) VALUES
(1, 'MY DEMON', 'Hàn Quốc', 5, 'Phim bộ', 'Kim Yoo-jung, Song Kang, Lee Sang-yi', 2023, '16 tập', 'Loạt phim mô tả câu chuyện về một cuộc hôn nhân hợp đồng giữa Do Do-hee (Kim Yoo-jung),người thừa kế quỷ dữ của một tập đoàn, và Jeong Gu-won (Song Kang),một con quỷ tạm thời mất đi sức mạnh của mình. Sự mất mát nhất thời này mang lại cho họ hạnh phúc thoáng qua nhưng cuối cùng dẫn đến địa ngục', 'Phụ đề Tiếng Việt', 'mydemon.jpg', 'https://www.youtube.com/embed/D-bAfFqvxZg?si=FIcL25BZSXqRDAb0', 'https://mega.nz/embed/1mtgySCB#hLW7UrJ-32r5uItGcMwFGAya8kXbXKATRzTYBS-zDYg\n'),
(2, 'NEVERTHELESS : DẪU BIẾT', 'Hàn Quốc', 5, 'Phim bộ', 'Han So-hee, Song Kang và Chae Jong-hyeop', 2021, '16 tập', 'Câu chuyện xoay quanh một cô gái bị cuốn hút bởi sự quyến rũ của bạn cùng trường nghệ thuật tài năng.Cô ấy luôn hoài nghi về tình yêu và không tin vào những mối quan hệ đầy cảm xúc. Tuy nhiên, dù do dự, cô ấy cuối cùng đã rơi vào một mối quan hệ thể xác chỉ là bạn bè. Nhưng liệu điều này có thực sự đơn giản như vậy hay không? Hãy cùng theo dõi câu chuyện này để khám phá những rối ren trong trái tim của nhân vật chính và những quyết định khó khăn mà cô ấy phải đối mặt.', 'Phụ đề Tiếng Việt', 'nevertheless.jpg', 'https://www.youtube.com/embed/0x8cJUD6MMo?si=MK3GsyijLG5JU5zy\r\n	\r\n', ''),
(3, 'ALL OF US ARE DEAD', 'Hàn Quốc', 1, 'Phim bộ', 'Park Ji Hoon,Yoon Chan Young,Cho Yi Hyun', 2022, '12 tập', 'Bộ phim là một câu chuyện Một trường cấp ba trở thành điểm bùng phát virus thây ma. Các học sinh mắc kẹt phải nỗ lực thoát ra – hoặc biến thành một trong những người nhiễm bệnh hung tợn.', 'Phụ đề Tiếng Việt', 'allofus.jpg', 'https://www.youtube.com/embed/IN5TD4VRcSM?si=PV0_idzrixnfNph5', ''),
(4, 'ĐIỀU KỲ DIỆU Ở PHÒNG GIAM SỐ 7 ', 'Hàn Quốc', 5, 'Phim lẻ', 'Ryu Seung-ryong, Kal So-won và Park Shin-hye.', 2013, '2 giờ 7 phút', 'Bộ phim là một câu chuyện ấm áp dành cho gia đình, kể về một người đàn ông tâm thần không ổn định bị kết tội oan là sát nhân và phải ở tù, anh ta đã xây dựng tình bạn với những tên tội phạm vô cảm trong phòng giam của ông, và ngược lại họ giúp ông gặp lại con gái mình bằng cách lén lút đưa cô bé vào tù.', 'Phụ đề Tiếng Việt', 'dkdpg7.jpg', 'https://www.youtube.com/embed/-BwR19Y4cjw?si=_UAvzYSDErKMNnIr', ''),
(5, 'CHUYẾN TÀU SINH TỬ ', 'Hàn Quốc', 2, 'Phim lẻ', 'Gong Yoo,Jung Yu Mi,Don Lee.', 2016, '1 giờ 58 phút', 'Ông bố đơn thân Seok-woo (Gong Yoo đóng) đưa con gái từ Seoul đến Busan trên chuyến tàu cao tốc KTX. Vừa lên tàu, zombie đã xông vào nhà ga, virus zombie trên người một cô gái đi trên tàu bắt đầu hoành hành và không ngừng lây lan, khiến chuyến tàu ngay lập tức trở thành thảm họa. Trên tuyến tàu cao tốc 442 km từ Seoul đến Busan, liệu người cha Seok-woo có thể vượt qua vòng vây và khó khăn để bảo vệ con gái yêu của mình đến nơi an toàn không?', 'Phụ đề Tiếng Việt', 'TrainToBusan.jpg', 'https://www.youtube.com/embed/t9qQRG2ZMhQ?si=FMFO8gxizqEsAdmj', 'https://www.youtube.com/embed/DSNiF7tTEQU?si=R9UQ7Yy-2oZQnp7j'),
(6, 'BỖNG DƯNG TRÚNG SỐ ', 'Hàn Quốc', 3, 'Phim lẻ', 'Go Kyung-pyo, Lee Yi-kyung, Eum Moon-suk, Park Se-wan và Kwak Dong- yeon', 2022, '1 giờ 53 phút', 'Người lính Hàn Chun Woo (Go Kyung-Pyo) vô tình nhặt được vé số trúng độc đắc trị giá 5,7 triệu USD. Anh chàng bất cẩn để tờ vé số bay sang bên kia biên giới, rơi vào tay người lính Triều Tiên Yong Ho (Lee Yi-Kyung). Chun Woo muốn đòi lại, còn Yong Ho không trả nhưng không thể sang Hàn Quốc lĩnh thưởng. Câu chuyện càng rắc rối khi đồng đội của cả hai biết được và tham gia vào cuộc đàm phán.', 'Phụ đề Tiếng Việt', 'Bong_dung_trung_so.jpg', 'https://www.youtube.com/embed/D3KbO3QF-lg?si=14pY_aDhhC6EuPks', 'https://mega.nz/embed/kidQzYQR#R9T5Bv4XhGb5XwWIkenLurshDdgKp9n62USlqSfgWe8\r\n'),
(7, 'GOBLIN : YÊU TINH', 'Hàn Quốc', 5, 'Phim bộ', 'Gong Yoo, Lee Dong-wook, Kim Go-eun, Yoo In-na và Yook Sung-jae', 2016, '16 tập', 'Bộ phim là một câu chuyện thần thoại kể về Kim Shin, trong quá khứ anh từng bị đâm bởi một thanh kiếm phép thuật, Kim Shin không những không chết mà còn có được cuộc sống bất tử. Ở thời hiện đại, anh gặp Ji Eun Tak, một nữ sinh cấp ba có khả năng dị biệt nhìn thấy linh hồn. Cuộc gặp gỡ của hai người sẽ viết nên một câu chuyện tình như thế nào...', 'Phụ đề Tiếng Việt', 'goblin.jpg', 'https://www.youtube.com/embed/S94ukM8C17A?si=3AlSKa6bB3YWt7Tp', ''),
(8, 'TWO WORLDS: HAI THẾ GIỚI', 'Hàn Quốc', 3, 'Phim bộ', ' Lee Jong-suk và Han Hyo-joo', 2016, '16 tập', 'Bộ phim là một câu chuyện về Kang Chul ở thế giới truyện tranh còn Oh Yeon Joo ở thế giới thực. Kỳ lạ thay, Yeon Joo vào được thế giới của Chul và cứu sống anh hết lần này đến lần khác. Chul cũng đến được thế giới thực và khám phá ra nhiều điều phũ phàng.', 'Phụ đề Tiếng Việt', 'twoworlds.jpg', 'https://www.youtube.com/embed/h_Nf1vTOy2s?si=ZfwzeminE1OnMnFf', ''),
(9, 'THE MOON : NHIỆM VỤ CUỐI CÙNG', 'Hàn Quốc', 4, 'Phim lẻ', 'Do Kyung-soo, Sol Kyung-gu và Kim Hee-ae.', 2022, '2 giờ 9 phút', 'Năm 2024, sứ mệnh đưa con người lên mặt trăng đầu tiên của Hàn Quốc đã kết thúc thảm bại trong một thảm họa thảm khốc khi một vụ nổ xảy ra trên tàu khiến tất cả phi hành đoàn đều thiệt mạng. Đến năm 2029, tàu vũ trụ Woori-ho của Hàn Quốc bắt đầu cuộc hành trình tới Mặt Trăng. Điều này đã thu hút sự chú ý của thế giới, nhưng một ngọn lửa Mặt Trời bùng lên đã nhấn chìm con tàu vũ trụ, chỉ còn lại duy nhất thành viên phi hành đoàn Hwang Sun-woo mắc kẹt tại Mặt Trăng.', 'Phụ đề Tiếng Việt', 'themoon.jpg', 'https://www.youtube.com/embed/8dILv6uswAY?si=HcuRY04ReDN9z0X6', ''),
(10, 'KING THE LAND: KHÁCH SẠN VƯƠNG GIẢ', 'Hàn Quốc', 5, 'Phim bộ', 'Do Kyung-soo, Sol Kyung-gu và Kim Hee-ae.', 2023, '16 tập', 'King The Land là một tác phẩm hài lãng mạn độc đáo, xoay quanh câu chuyện tình yêu giữa Gu Won - con trai thứ hai của Chủ tịch tập đoàn King và Sa Rang - một cô thực tập sinh. Gu Won đối mặt với mối quan hệ phức tạp với gia đình, nơi những vết nứt từ quá khứ làm cho mọi thứ trở nên phức tạp.', 'Phụ đề Tiếng Việt', 'king-the-land.jpg', 'https://www.youtube.com/embed/WscxU8_awkI?si=ZHOfLq61LTqXGGui\r\n\r\n', ''),
(11, 'LOVE WHEN THE STAR FALL -TINH LẠC NGƯNG THÀNH ĐƯỜNG', 'Trung Quốc', 5, 'Phim bộ', 'Trần Tinh Húc, Lý Lan Địch, Hà Tuyên Lâm, Trần Mục Trì', 2023, '40 tập', 'Tinh Lạc Ngưng Thành Đường được xây dựng dựa trên cuốn tiểu thuyết cùng tên của tác giả Nhất Độ Quân Hoa. Phim xoay quanh số phận của 2 nàng công chúa: cô chị Thanh Quy ấm áp, là niềm tự hào của cả gia tộc và người chị em còn lại là Dạ Đàm: tính khí thất thường, được coi là điềm xấu của gia tộc. Chuyện xảy ra khi cả 2 gặp sự cố nhầm kiệu hoa. Từ đây nhiều chuyện dở khóc dở cười xảy ra, kéo theo đó là những âm mưu chấn động 4 cõi được làm sáng tỏ. Đây được coi như phiên bản “tiên-ma” của tác phẩm điện ảnh kinh điển “Lên nhầm kiệu hoa được chồng như ý”.', 'Phụ đề Tiếng Việt', 'lovewhen.jpg', 'https://www.youtube.com/embed/NqFyQvdMiGs?si=ew3j5ULfypZRfkuh', ''),
(12, 'HIDDEN LOVE -VỤNG TRỘM KHÔNG THỂ GIẤU', 'Trung Quốc', 5, 'Phim bộ', 'Triệu Lộ Tư ,Trần Triết Viễn, Mã Bá Khiên', 2023, '25 tập', 'Bộ phim Vụng Trộm Không Thể Giấu - Hidden Love xoay quanh mối tình lặng lẽ từ thời còn trẻ đến khi trưởng thành của Tang Trĩ và Đoàn Gia Hứa không thể được giấu kín. Tang Trĩ, cô gái nghịch ngợm, có anh trai hơn cô 7 tuổi là Tang Diên.', 'Phụ đề Tiếng Việt', 'vuungtrom.jpg', 'https://www.youtube.com/embed/2PPJHjPlr2c?si=aZAyN4RX03imDWQ5', ''),
(13, 'GO AHEAD - LẤY DANH NGHĨA NGƯỜI NHÀ', 'Trung Quốc', 5, 'Phim bộ', 'Đàm Tùng Vận, Tống Uy Long, Trương Tân Thành', 2020, '46 tập', 'Lấy danh nghĩa người nhà là bộ phim kể về cuộc sống của hai ông bố và ba đứa trẻ không cùng huyết thống. Lý Tiêm Tiêm (Đàm Tùng Vận), Lăng Tiêu (Tống Uy Long), Hạ Tử Thu (Trương Tân Thành) là ba anh em cùng lớn lên trong một gia đình, nhưng mỗi người đều có một người mẹ khác nhau. Ba anh em của họ cùng nhau trưởng thành như thanh mai trúc mã nhưng sau này, vì vấn đề phát sinh từ gia đình vốn có của mỗi một đứa trẻ đã gây nên nhiều sự trở ngại trong tâm lý của họ. Dù xảy ra nhiều biến cố nhưng ba đứa trẻ đó vẫn vượt qua được nhờ vào sự hỗ trợ từ tình cảm gia đình. Những \"người thân\" đã từng tổn thương họ, lấy danh nghĩa là \"người nhà\" để chia rẽ họ.', 'Phụ đề Tiếng Việt', 'laydn.jpg', 'https://www.youtube.com/embed/UAqljBnWzRE?si=1vpOqTrLvwu1Fpns', ''),
(14, 'CINDERELLA CHEF- MANH THÊ THỰC THẦN', 'Trung Quốc', 4, 'Phim bộ', 'Diệp Giai Dao', 2018, '12 tập', 'Manh Thê Thực Thần là phim hoạt hình xuyên không nổi tiếng của Trung Quốc được sản xuất năm 2018. Bộ phim xoay quanh Diệp Giai Dao - một biên tập viên liên quan đến mỹ thực, bất ngờ xuyên không về thời Hoài Tống và trở thành tân nương của tam đương gia Hạ Thuần Vu. Chàng là gián điệp được triều đình cài vào băng nhóm thổ phỉ nên luôn cảnh giác và nghi ngờ tân nương của mình. Nhờ vào kỹ nghệ đặc biệt mà Giai Dao dần dần lấy được cảm tình của Hạ Thuần Vu.', 'Phụ đề Tiếng Việt', 'manhthe.jpg', 'https://www.youtube.com/embed/XdlWdCp-krs', ''),
(15, 'TÂN VUA HÀI KỊCH', 'Trung Quốc', 3, 'Phim lẻ', 'Ngạc Tĩnh Văn, Vương Bảo Cường, Trương Kỳ, Trương Toàn Đản, Như Dương', 2019, '91 phút', 'Đây là một trong những bộ phim hài Trung Quốc hay nhất kể về nhân vật Tiểu Mộng với ước mơ trở thành một diễn viên nổi tiếng được nhiều người biết đến. Để vươn đến mong ước của mình, cô không ngừng cố gắng từng ngày nhưng vận may vẫn chưa tìm đến Tiểu Mộng khi cô chỉ được vào các vai quần chúng. Thấy thế, mọi người xung quanh luôn ra sức ngăn cản, thậm chí đến cả đạo diễn cũng khuyên nhủ cô nên dừng lại mong ước đóng phim. Những tưởng cô gái sẽ nản mà rút lui nhưng Tiểu Mộng vẫn nhất mực theo đuổi bộ môn nghệ thuật thứ bảy. Trớ trêu thay, vận xui vẫn không ngừng bám theo khi cô phát hiện đã bị bạn trai lừa mất số tiền dành dụm bấy lâu. Liệu rằng Tiểu Mộng có tiếp tục theo đuổi ước mơ diễn xuất bao năm của mình hay sẽ vì những khó khăn mà chùn bước?', 'Phụ đề Tiếng Việt', 'tanvua.jpg', 'https://www.youtube.com/embed/fPAbgG3oy5g?si=lpphtxpSwaQVlRr6', ''),
(16, 'TIÊN SINH ẨN CƯ YÊU DẤU', 'Trung Quốc', 5, 'Phim bộ', 'Thang Mẫn, Trần Tịnh Khả', 2023, '24 tập', 'Tiên Sinh Ẩn Cư Yêu Dấu - Dear Mr Hermitage (2023 là một bộ phim hoạt hình được mong chờ trong năm 2023. Bộ phim này kể về một câu chuyện đầy cảm xúc về mất mát, tình yêu và sự trưởng thành. Tập trung vào nhân vật chính Tô Thời Vũ, một blogger ẩm thực không tên tuổi bị cộng sự phản bội và mất hết công trình mà cô đã dày công xây dựng trong nhiều tháng. Tuy nhiên, cô không thể ngồi trong đau đớn và buồn bã mà phải chấp nhận một nhiệm vụ ngớ ngẩn từ Lâm Hiếu Kiện, chủ tịch của Tập đoàn Cà Phê Hảo Vị. Chính từ đây, cuộc sống của Tô Thời Vũ và Lâm Vị thay đổi hoàn toàn.', 'Phụ đề Tiếng Việt', 'tiensinh.jpg', 'https://www.youtube.com/embed/lQ-SoeBOJsI?si=AZ0vXnTfPONPJ-eA', ''),
(17, 'LEGEND OF YUNXI- VÂN TỊCH TRUYỆN', 'Trung Quốc', 5, 'Phim bộ', ' Cúc Tịnh Y, Mễ Nhiệt, Lâm Tư Ý', 2018, '48 tập', 'Vân Tịch Truyện, xoay quanh cuộc sống đầy sáng tạo của Hàn Vân Tịch, một cô gái đặc biệt với khả năng độc thuật. Vì sẹo trên khuôn mặt, cô bị xa lánh và chê bai. Nhưng trong một cơ duyên, Vân Tịch quyết định tham gia vào phủ của Tần Vương - Long Phi Dạ, để thám thính tình hình và giúp ông và Thái hậu. Trong hành trình này, Vân Tịch gặp Cố Thất Thiếu, người luôn sẵn lòng bảo vệ cô khi gặp nguy hiểm. Qua nhiều biến cố, tình cảm giữa Vân Tịch và Tần Vương dần phát triển.', 'Phụ đề Tiếng Việt', 'vantich.jpg', 'https://www.youtube.com/embed/KbBUKlFapnE?', ''),
(18, 'CHIẾC BẬT LỬA VÀ VÁY CÔNG CHÚA', 'Trung Quốc', 5, 'Phim bộ', 'Trần Phi Vũ ,Trương Tịnh Nghi', 2022, '36 tập', 'Chiếc Bật Lửa Và Váy Công Chúa kể về mối tình giữa thủ khoa khối tự nhiên của tỉnh Lý Tuân và cô nàng cán sự môn Chu Vận, trải qua biết bao sóng gió và biến cố khi trưởng thành thì cuối cùng hai người đã quay trở về với nhau.', 'Phụ đề Tiếng Việt', 'batlua.jpg', 'https://www.youtube.com/embed/iGidos6Gd2o?si=SoWi3MkCaWfocuWM', ''),
(19, 'GỬI THỜI THANH XUÂN ẤM ÁP CỦA CHÚNG TA', 'Trung Quốc', 5, 'Phim bộ', ' Hình Phi, Lâm Nhất', 2019, '25 tập', 'Cô nữ sinh Tư Đồ Mạt thiếu dũng khí, thiếu quyết đoán từ nhỏ đến lớn đã quen với việc làm theo sự sắp xếp của gia đình. Nhưng từ khi ngoài ý muốn quen biết chàng thiên tài vật lý Cố Vị Dịch, từ đây cuộc sống bình lặng của cô trở nên đặc sắc. Nhiều lần đôi oan gia này có giao chiến, có liên minh, cũng vì vậy mà cả hai dần cởi bỏ những định kiến và dần yêu thích đối phương. Hai người cùng nhau trải qua những cột mốc quan trọng như tốt nghiệp, kiếm việc, đi làm, và nhận ra rằng thời khắc thanh xuân ấm áp nhất chính là cùng đúng đối tượng lựa chọn đúng phương hướng và nắm tay nhau cùng trải qua năm tháng.', 'Phụ đề Tiếng Việt', 'gtthx.jpg', 'https://www.youtube.com/embed/mvuH_Cvr86E?', ''),
(20, 'SKY-HUNTER-THỢ SĂN BẦU TRỜI', 'Trung Quốc', 2, 'Phim lẻ', 'Lý Thần, Phạm Băng Băng', 2017, '1 giờ 55 phút', 'Cốt truyện tập trung vào một nhóm binh sĩ Trung Quốc ưu tú có nhiệm vụ ngăn chặn một âm mưu khủng bố và giải quyết một cuộc khủng hoảng con tin.', 'Phụ đề Tiếng Việt', 'skyhunter.jpg', 'https://www.youtube.com/embed/_bVG7QrIfvI?si=vMFSHGu4LdnTbKqn', ''),
(21, 'The Magician is Elephant', 'Âu-Mỹ', 5, 'Phim lẻ\r\n', 'Noah Jupe, Mandy Patinkin, Brian Tyree Henry', 2023, '1 tiếng 43 phút', 'The Magician’s Elephant kể về một cậu bé quyết tâm chấp nhận lời thách thức của nhà vua để thực hiện ba nhiệm vụ bất khả thi nhằm đổi lấy con voi kỳ diệu và cơ hội theo đuổi vận mệnh của mình.', 'Phụ đề Tiếng Việt', 'convoi.jpg', 'https://www.youtube.com/embed/JvNuYOR7b4w', ''),
(22, 'The Creator', 'Âu-Mỹ', 4, 'Phim lẻ', 'Gemma Chan, John David Washington, Ralph Ineson, Ngo Thanh Van', 2023, '2 tiếng 14 phút', 'The Creator kể về một bộ phim hành động viễn tưởng lấy bối cảnh cuộc chiến trong tương lai giữa loài người và trí tuệ nhân tạo. Joshua, một cựu đặc vụ đang đau buồn trước sự mất tích của người vợ, được thuê để tiêu diệt Creator, kẻ đã đứng sau phát triển một loại vũ khí có sức mạnh chấm dứt mọi cuộc chiến và sự sống của toàn thể nhân loại. Joshua và nhóm đặc vụ tinh nhuệ đã lần theo dấu vết tiến vào lãnh thổ bị A.I chiếm đóng, chỉ để khám phá ra vũ khí hủy diệt thế giới mà anh ta được giao tiêu diệt là một A.I dưới hình hài của một đứa trẻ.', 'Phụ đề Tiếng Việt', 'kekientao.jpg', 'https://www.youtube.com/embed/ex3C1-5Dhb8?si=SrRErQEs_jFiuu9b', ''),
(23, 'A Haunting in Venice', 'Âu-Mỹ', 5, 'Phim lẻ', 'Kenneth Branagh, Kyle Allen, Camille Cottin, Jamie Dornan, Tina Fey, Jude Hill', 2023, '1 tiếng 35 phút', 'Án Mạng Ở Venice dựa trên tiểu thuyết Halloween Party của nhà văn Agatha Christie, hành trình phá án của thám tử Hercule Poirot tiếp tục được đưa lên màn ảnh rộng. Thám tử nổi tiếng Hercule Poirot, hiện đã nghỉ hưu và sống lưu vong ở Venice, miễn cưỡng tham dự một buổi lễ Halloween tại một cung điện ma ám, mục nát. Khi một trong những vị khách bị sát hại, vị thám tử bị đẩy vào một thế giới đầy bóng tối và bí mật đầy nham hiểm.', 'Phụ đề Tiếng Việt', 'venice.jpg', 'https://www.youtube.com/embed/yEddsSwweyE?si=TdjWySSFh_Ul1kcG', ''),
(24, 'Haunted Mansion', 'Âu-Mỹ', 1, 'Phim lẻ', 'Jamie Lee Curtis, Owen Wilson, Rosario Dawson', 2023, '1 tiếng 40 phút', 'Dinh Thự Ma Ám kể về một bà mẹ đơn thân tên Gabbie thuê một hướng dẫn viên du lịch, một nhà ngoại cảm, một linh mục và một nhà sử học để giúp trừ tà cho căn biệt thự mới mua của họ; sau khi phát hiện ra nó là nơi sinh sống của ma.', 'Phụ đề Tiếng Việt', 'mansion.jpg', 'https://www.youtube.com/embed/AjLKTz81bj8?si=FDXLduTA8HhP5Ujz', ''),
(25, 'No One Will Save You', 'Âu-Mỹ', 4, 'Phim lẻ', 'Kaitlyn Dever, Elizabeth Kaluev, Zack Duhame, Lauren L. Murray, Geraldine Singer, Dane Rhodes', 2023, '1 tiếng 33 phút', 'Sẽ Không Ai Cứu Bạn kể về một người đồng hương bị đày ải đầy lo lắng phải chiến đấu với người ngoài hành tinh đã tìm được đường vào nhà cô.', 'Phụ đề Tiếng Việt', 'saveyou.jpg', 'https://www.youtube.com/embed/IcA02w6rm44?si=F27NVNZZXos130fD', ''),
(26, 'WONDER WOMAN: NỮ THẦN CHIẾN BINH', 'Âu-Mỹ', 2, 'Phim lẻ', 'Robin Wright, David Thewlis, Connie Nielsen, Elena Anaya, Chris Pine, Gal Gadot, Danny Huston, Ewen Bremner, Saïd Taghmaoui', 2017, '1 tiếng 46 phút', 'Phim Wonder Woman: Nữ Thần Chiến Binh: Trước khi trở thành Wonder Woman, Diana (Gal Gadot) là công chúa chiến binh Amazon của hòn đảo Themyscira. Khi chàng phi công Steve Trevor (Chris Pine) trôi dạt vào đảo và kể về cuộc đại chiến đang diễn ra tại thế giới bên ngoài, Diana quyết định rời khỏi quê nhà để giải cứu nhân loại. Từ đó cô khám phá ra quyền năng và sứ mệnh thật sự của mình.', 'Phụ đề Tiếng Việt + Thuyết Minh', 'woman.jpg', 'https://www.youtube.com/embed/VSB4wGIdDwo?si=PPaoFE15LN-yCjb8', ''),
(27, '97 Minutes', 'Âu-Mỹ', 2, 'Phim lẻ', 'Jonathan Rhys Meyers, Alec Baldwin, MyAnna Buring, Jo Martin, Michael Sirow, Pavan Grover', 2023, '1 tiếng', '97 Phút kể về một kịch bản đồng hồ tích tắc mở ra khi chiếc máy bay 767 bị không tặc đối mặt với thảm họa sắp xảy ra khi nguồn cung cấp nhiên liệu của nó cạn kiệt, chỉ còn 97 phút.', 'Phụ đề Tiếng Việt', '97.jpg', 'https://www.youtube.com/embed/BvFSHL9erCU?si=GXINOtu4-6J1Mq7m', ''),
(28, 'Kung Fu Panda', 'Âu-Mỹ', 6, 'Phim lẻ', 'Thành Long, Jack Black, Angelina Jolie, Ian McShane, Dustin Hoffman', 2008, '1 tiếng 33 phút', 'Công Phu Gấu Trúc kể về Po là một chú gấu trúc to béo, ham ăn và mê môn võ kungfu. Trong một ngày hội, lời tiên tri từ xưa đã giúp Po có thể thực hiện ước mơ của mình. Xem phim online này, các bạn sẽ theo dõi Po học tập với sư phụ Shifu và nhóm Ngũ Hùng. Nhưng vấn đề ở chỗ cậu chàng lại là kẻ lười biếng nhất thung lũng Thanh Bình. Và rồi mọi chuyện hoàn toàn thay đổi trong phim hd này khi con báo tuyết gian ác Tai Lung trốn thoát khỏi tù. Hắn ráo riết lên kế hoạch tấn công thung lũng. Và người anh hùng được chọn để chiến đấu chống lại Tai Lung, không ai khác chính là Po béo.', 'Phụ đề Tiếng Việt', 'gau.jpg', 'https://www.youtube.com/embed/NRc-ze7Wrxw?si=5OXt2Cjx7ar9ckxx', ''),
(29, 'KING KONG VÀ NGƯỜI ĐẸP', 'Âu-Mỹ', 2, 'Phim lẻ', 'aomi Watts, Adrien Brody, Jack Black, Andy Serkis, Jamie Bell', 2005, '3 tiếng 20 phút', 'Trong phim King Kong Và Người Đẹp, vì muốn kiếm thật nhiều tiền với những thước phim đắt giá, một đạo diễn đã đưa nhóm làm phim cùng toàn bộ thủy thủ trên chiếc tàu phiêu lưu khám phá hòn đảo nguyên thủy chưa một dấu chân người - đảo Sọ Người. Và những điều kinh hoàng nhất đã xảy ra khi con tàu cập bến, bởi chủ nhân của hòn đảo là một bộ tộc man rợ, đàn khủng long bạo chúa và đầy rẫy sinh vật nguy hiểm, ngay cả giun đất cũng đòi ăn thịt người.', 'Phụ đề Tiếng Việt', 'Kingkong.jpg', 'https://www.youtube.com/embed/1TSidCNA7mQ?si=2t_mjDJgVhVNIj5N', ''),
(30, '3 DAYS IN MALAY ', 'Âu-Mỹ', 2, 'Phim lẻ', 'Louis Mandylor, Donald Cerrone, Quinton Jackson, Peter Dobson, Ryan Francis, Randall J. Bacon', 2023, '1 tiếng 20 phút', '3 Days in Malay kể về thủy quân lục chiến đóng quân tại một sân bay ở Malay trong Thế chiến thứ hai nhận được tin báo về một cuộc đột kích sắp tới của quân Nhật. Không thể phê duyệt quân tiếp viện, họ tham gia vào trận chiến cam go kéo dài 3 ngày chống lại lực lượng kẻ thù.', 'Phụ đề Tiếng Việt', 'malay.jpg', 'https://www.youtube.com/embed/UaEZXYt7Ihk?si=bE2pdkybn-kIXzVg', ''),
(31, 'KHI TA 25', 'Việt Nam', 2, 'Phim lẻ', 'Midu, Phú Thịnh, Lê Dương Bảo Lâm, Lãnh Thanh, Him Phạm', 2023, '1 tiếng 38 phút', 'Khi Ta 25 kể câu chuyện xoay quanh Tuệ Lâ(Midu), quản lý của band nhạc nam đình đám The Air. Bất ngờ, talent Anh Khang – giọng ca chính qua đời khiến tương lai cả nhóm rơi vào bế tắc. Những kế hoạch ấp ủ bấy lâu của Tuệ Lâm cùng band nhạc đành phải gác lại. Đương lúc chán nản, cô bị cử sang Hàn Quốc làm việc. Các thành viên cũng chấp nhận rã nhóm, tìm kế mưu sinh tự do. Ngày trở về nước, Tuệ Lâm nhận ra mình đã bị Giám đốc lừa. Cô rủ người bạn thân Mạnh Hùng(Lê Dương Bảo Lâm)nghỉ việc, cùng nhau gây dựng công ty giải trí mới. Cả hai tìm cách triệu tập các thành viên The Air năm xưa, với ý định hồi sinh tên tuổi của họ. Đồng thời, cô tuyển thêm talent mới – Thiên Bảo (Phú Thịnh), thay thế cho vị trí của Anh Khang.', 'Phụ đề Tiếng Việt', '25.jpg', 'https://www.youtube.com/embed/KjV0gDd9XEQ?si=23ya9U7D-D26YkdJ', ''),
(32, 'THÁNG NĂM RỰC RỠ', 'Việt Nam', 5, 'Phim lẻ', 'Hoàng Yến Chibi, Hoàng Oanh, Jun Vũ, Khổng Tú Quỳnh, Trịnh Thảo, Minh Thảo', 2018, '1 tiếng 30 phút', 'THÁNG NĂM RỰC RỠ là câu chuyện về tình bạn, về thời tuổi trẻ cuồng nhiệt của một nhóm bạn gái thời trung học. Bộ phim là hành trình đi tìm lại những ký ức thanh xuân của Hiểu Phương (Hồng Ánh) và nhóm nữ quái Ngựa Hoang. Tình cờ gặp lại người bạn cũ Mỹ Dung (Thanh Hằng) và cũng là trưởng nhóm Ngựa Hoang, Hiểu Phương đau xót khi biết bạn đang mắc bệnh hiểm nghèo. Để thực hiện tâm nguyện của bạn thân, Hiểu Phương quyết tâm tìm lại các thành viên của nhóm Ngựa Hoang. Hành trình đi tìm những người bạn cũ cũng chính là hành trình để Hiểu Phương trở về với những “THÁNG NĂM RỰC RỠ” của cuộc đời mình.', 'Phụ đề Tiếng Việt', 'thangnam.jpg', 'https://www.youtube.com/embed/RyQeBPpZqdY?si=JSQkGo916hddPS8W', ''),
(33, 'ĐOẠT HỒN', 'Việt Nam', 5, 'Phim lẻ', 'Nguyễn Ngọc Hiệp, Trần Bảo Sơn, Nguyễn Hồng Ân', 2014, '1 tiếng 35 phút', 'Đoạt Hồn kể về bé Ái 8 tuổi bị trượt chân xuống sông và mất tích. Một tuần sau đó, cậu của Ái là một cảnh sát, tìm được xác Ái ở một vùng quê, và chứng kiến Ái ngồi bật dậy từ nhà xác. Anh ta mang Ái về nhà, nhưng không nói với bố mẹ Ái rằng lúc anh ta tìm thấy Ái đã chết. Nhiều sự việc kỳ lạ đã diễn ra ở gia đình họ Vương cho đến khi họ khám phá ra Ái đã bị đoạt hồn.', 'Phụ đề Tiếng Việt', 'DoatHon.jpg', 'https://www.youtube.com/embed/P1K9dNhRWDI?si=pbRxuA_jBXGZMUAu', ''),
(34, 'ĐẤT PHƯƠNG NAM', 'Việt Nam', 5, 'Phim lẻ', 'Hùng Thuận, Phùng Ngọc, Thúy Loan, Thanh Điền, Lê Quang, Mạnh Dung, Kiều Oanh, Cát Phượng, Trung Dân', 1997, '1 tiếng 35 phút', 'Phim Đất Phương Nam là một câu chuyện về cuộc sống của những con người dân quê bình dị trong thời cuộc loạn lạc Nam Bộ trong thời kỳ thực dân Pháp và bọn cường hào, địa chủ cai trị. Mỗi số phận, mỗi cảnh đời trong từng trang tiểu thuyết đã bước ra bằng xương, bằng thịt trở thành những nhân vật trong phim. Do nghịch cảnh mất mẹ, cậu bé An trôi dạt tha phương trên bước đường đi tìm cha. Lưu lạc về phương Nam, An gặp những cảnh đời ngang trái, những mảnh đời lầm than của người nông dân dưới ách áp bức của phong kiến và thực dân. Giữa đất trời mênh mông nhưng các người nông dân phải chịu cảnh mất đất đai; được mùa nhưng không giữ được vật phẩm. Hoàn cảnh đã đưa đẩy họ trở thành những người nông dân khởi nghĩa.', 'Phụ đề Tiếng Việt', 'phuongnam.jpg', 'https://www.youtube.com/embed/hktzirCnJmQ?si=Rh8mGkXfZ2i2WUe2', ''),
(35, 'EM CHƯA 18', 'Việt Nam', 3, 'Phim lẻ', 'Kaity Nguyễn, Châu Bùi, Kiều Minh Tuấn', 2017, '1 tiếng 36 phút', 'Em Chưa 18 bắt đầu với Hoàng, một tay chơi bảnh tỏn, thu nhập ngất ngưởng, sống cùng quy luật \"không có đêm thứ 2\" với bất kỳ cô nàng nào. Định mệnh ập đến khi chàng trai trong mơ của bao người đàn ông gặp gỡ Linh Đan. Dĩ nhiên, cả hai đã có mối tình chớp nhoáng và không hề có gì khác biệt với những cô gái trước đây, cho đến khi Hoàng phát hiện ra bạn gái mới của mình chưa đủ 18 tuổi. Từ đây, cả thế giới đào hoa của gã tay chơi số bất ngờ thu nhỏ lại trong lưới tình của cô học trò xinh đẹp tinh quái.', 'Phụ đề Tiếng Việt', '18.jpg', 'https://www.youtube.com/embed/JumMd7g61Gw?si=2bOxFFYkwUpCD4sa ', ''),
(36, 'TRO TÀN RỰC RỠ', 'Việt Nam', 5, 'Phim lẻ', 'Phương Anh Đào, Juliet Bảo Ngọc Doling, Lê Công Hoàng', 2022, '1 tiếng 45 phút', 'Tro Tàn Rực Rỡ lấy bối cảnh xóm nghèo miền Tây sông nước, phim là chuyện tình khắc khoải của ba người phụ nữ với những người đàn ông họ chọn gắn bó, nhưng cũng là người gây nhiều tổn thương cho họ suốt một đời.', 'Phụ đề Tiếng Việt', 'trotan.jpg', 'https://www.youtube.com/embed/nAsKoWNgIWA?si=FzUI-ZdsQ2Vs_RpF ', ''),
(37, 'CHỊ CHỊ EM EM 2', 'Việt Nam', 3, 'Phim lẻ', 'Ngọc Trinh, Minh Hằng, Lê Giang', 2023, '1 tiếng 45 phút', 'Chị Chị Em Em 2 dựa trên giai thoại về hai đệ nhất mỹ nhân Sài thành Ba Trà & Tư Nhị, Minh Hằng & Ngọc Trinh mang về doanh thu hơn 120 tỷ đồng, á quân phòng vé ba tuần liên tiếp trên đường đua phim Tết 2023.', 'Phụ đề Tiếng Việt', 'chiem.jpg', 'https://www.youtube.com/embed/j3r7kq0UZMw?si=0KzWOFuvhOkZTO0a ', ''),
(38, 'CHÍ PHÈO NGOẠI TRUYỆN', 'Việt Nam', 3, 'Phim lẻ', 'Kiều Minh Tuấn, Thu Trang, Lilly Nguyễn, Phương Trinh Jolie, Xuân Tiến, Tiến Luật', 2017, '1 tiếng 35 phút', 'Chí Phèo Ngoại Truyện kể về cô gái kém sắc được ví như Thị Nở tên Na làm lao công trong một văn phòng thám tử với mong muốn học hỏi kinh nghiệm để điều tra về cái chết của anh trai mình. Sau lần tình cờ đụng độ Chí – tay giang hồ mặt sẹo khét tiếng, cả hai hợp tác với nhau để tìm ra sự thật.', 'Phụ đề Tiếng Việt', 'chipheo.jpg', 'https://www.youtube.com/embed/-tMxINnNsjE?si=o1xCdb_1zK46-5FZ ', ''),
(39, 'HOÁN ĐỔI', 'Việt Nam', 5, 'Phim lẻ', 'Huỳnh Lập, Việt Hương, Trấn Thành, Ngô Kiến Huy, Nabi Nhã Phương', 2018, '1 tiếng 36 phút', 'Hoán Đổi là câu chuyện tréo ngoe về sự hoán đổi thân xác giữa 2 người nhân vật: ca sỹ Tiên Tiên và võ sư Mai Ngọc Hoa, chính sự hoán đổi này đã gây ra nhiều tình huống dở khóc, dở cười vì sự hiểu lầm của các nhân vật xung quanh. Ban đầu 2 nhân vật rất bỡ ngỡ vì sự hoán đổi này nên rất ghét nhau nhưng theo thời gian khi ở trong thân xác của đối phương, họ lại vô tình nhận ra được những sai lầm của bản thân. Liệu họ có thể sữa chữa sai lầm và quay trở lại với thân xác của mình không?.', 'Phụ đề Tiếng Việt', 'hoandoi.jpg', 'https://www.youtube.com/embed/Np5bf7wWN8s?si=dgqEV_s6na0_RF1S \r\n', ''),
(40, 'HAI PHƯỢNG', 'Việt Nam', 2, 'Phim lẻ', '‘Ngô Thanh Vân, Mai Cát Vy, Phan Thanh Nhiên, Phạm Anh Khoa, Trần Thanh Hoa', 2019, '1 tiếng 38 phút', '‘Hai Phượng kể về cuộc hành trình đầy gay cấn và gian của khi người mẹ vùng quê tìm cách cứu con mình thoát khỏi đường dây bắt cóc khổng lồ. Không tấc sắc trong tay, người phụ nữ thân cô thế cô làm sao chống lại bọn xã hội đen tàn ác để giành lại nguồn sống của đời mình?.', 'Phụ đề Tiếng Việt', 'haiphuong.jpg', 'https://www.youtube.com/embed/THXPCF6UHh8\"', ''),
(41, 'BỮA CƠM NGÀY MAI CHÚNG TA CÙNG CHỜ ĐỢI', 'Nhật Bản', 5, 'Phim lẻ', 'Karen Miyama, Yuko Araki, Yuto Nakajima, Amane Okayama, Hairi Katagiri trong, Chieko Matsubara', 2017, '1 tiếng 49 phút', 'Bộ phim Bữa Cơm Ngày Mai Chúng Ta Cùng Chờ Đợi kể về chuyện tình đắng cay ngọt ngào trong 7 năm giữa Ryota Hayama và Koharu Uemura từ ngày đầu tiên hẹn hò cho đến ngày họ kết hôn. Ryota và Koharu đều là học sinh trung học nhưng tính cách họ tương phản nhau. Ryota là chàng trai trầm tính, gần như thờ ơ với mọi thứ xung quanh trong khi đó Koharu là cô gái thẳng thắn tràn đầy năng lượng. Kể từ ngày hợp sức thử thách nhảy bao gạo, họ bắt đầu quen nhau. Họ hẹn hò ở quán ăn nhanh, nhận ra đã phải lòng đối phương ở một quán ăn gia đình và hẹn ước tình yêu bên bàn ăn với những hạt cơm trắng.', 'Phụ đề Tiếng Việt', 'buacom.jpg', 'https://www.youtube.com/embed/9IMCtzEfWBc', ''),
(42, 'GODZILLA MINUS ONE', 'Nhật Bản', 2, 'Phim lẻ', 'Kamiki Ryunosuke, Kamiki Ryunosuke, Yamada Yuki, Aoki Munetaka, Yoshioka Hidetaka, Ando Sakura', 2023, '1 tiếng 56 phút', 'Godzilla Minus One kể về ở Nhật Bản thời hậu chiến, một nỗi kinh hoàng mới trỗi dậy. Liệu những người bị tàn phá có thể sống sót... chứ đừng nói đến việc chống trả?.', 'Phụ đề Tiếng Việt', 'gozila.jpg', 'https://www.youtube.com/embed/VvSrHIX5a-0', ''),
(43, 'MỸ VỊ HẦM NGỤC', 'Nhật Bản', 6, 'Phim lẻ', 'KentaroKumagai, Sayaka Sembongi, Tomari Asuna', 2024, '27 phút', 'Mỹ Vị Hầm Ngục kể cề hầm ngục, rồng… và món quái vật hầm thơm ngon!? Các nhà thám hiểm đột nhập vào vương quốc trúng lời nguyền bị chôn vùi để cứu bạn mình và gây náo loạn trên đường đi.', 'Phụ đề Tiếng Việt', 'myvi.jpg', 'https://www.youtube.com/embed/-AdgKIMBW0k', ''),
(44, 'MIỀN ĐẤT DỮ ', 'Nhật Bản', 2, 'Phim lẻ', 'Ando Sakura, Yamada Ryosuke, Tendo Yoshimi, Namase Katsuhisa, Uzaki Ryudo, Yoshihara Mitsuo', 2023, '1 tiếng 44 phút', 'Miền Đất Dữ cô nàng lừa đảo và cậu em gây rối bỗng có được số tiền khổng lồ, nhưng số tiền bất chính đó khiến họ trở thành mục tiêu.', 'Phụ đề Tiếng Việt', 'miendat.jpg', 'https://www.youtube.com/embed/60pVjuNxm5c', ''),
(45, 'TÔI LÀ CHIHIRO', 'Nhật Bản', 5, 'Phim lẻ', 'Arimura Kasumi,Toyoshima Hana,	Shimada Tetta,Lily Franky,Fubuki Jun,Hirata Mitsuru', 2023, '2 tiếng 11 phút', '‘Tôi Là Chihiro kể về một người phụ nữ từng là gái mại dâm không ngại ngần bắt đầu làm việc ở quán cơm hộp tại một thị trấn nhỏ ven biển và mang lại niềm an ủi cho những tâm hồn cô đơn mà cô gặp.', 'Phụ đề Tiếng Việt', 'chihiro.jpg', 'https://www.youtube.com/embed/QN5yY4VcOJI', ''),
(46, 'DORAEMON:NOBITA VÀ CUỘC CHIẾN VŨ TRỤ TÍ HON', 'Nhật Bản', 6, 'Phim lẻ', 'Subaru Kimura, Megumi Oohara, Megumi Oohara, Kakazu Yumi, Seki Tomokazu …', 2022, '1 tiếng 39 phút', 'Doraemon: Nobita Và Cuộc Chiến Vũ Trụ Tí Hon kể về Nobita tình cờ gặp được người ngoài hành tinh tí hon Papi, vốn là Tổng thống của hành tinh Pirika, chạy trốn tới Trái Đất để thoát khỏi những kẻ nổi loạn nơi quê nhà. Doraemon, Nobita và hội bạn thân dùng bảo bối đèn pin thu nhỏ biến đổi theo kích cỡ giống Papi để chơi cùng cậu bé. Thế nhưng, một tàu chiến không gian tấn công cả nhóm. Cảm thấy có trách nhiệm vì liên lụy mọi người, Papi quyết định một mình đương đầu với quân phiến loạn tàn ác. Doraemon và các bạn lên đường đến hành tinh Pirika, sát cánh bên người bạn của mình.', 'Phụ đề Tiếng Việt', 'doraemon.jpg', 'https://www.youtube.com/embed/bALKXsKhEEs', ''),
(47, 'YÊU GIỮA VÙNG NƯỚC DỮ', 'Nhật Bản', 5, 'Phim lẻ', 'Yoshizawa Ryo, Miyazaki Aoi, Yoshida Yoh, Kikuchi Rinko, Nagayama Kento, Izumisawa Yuuki', 2023, '1 tiếng 55 phút', 'Yêu Giữa Vùng Nước Dữ kể về tình cảm, bí ẩn và hỗn loạn diễn ra trên con tàu sang trọng hướng tới biển Aegean khi một quản gia và một hành khách cố gắng phá giải vụ án mạng khó hiểu.', 'Phụ đề Tiếng Việt', 'water.jpg', 'https://www.youtube.com/embed/p1cnwTlVYK0', ''),
(48, 'TÊN CẬU LÀ GÌ?', 'Nhật Bản', 6, 'Phim lẻ', 'Shinta Takagi, Tsukasa Fujii, Futaha Miyamizu', 2016, '1 tiếng 37 phút', 'Tên Cậu Là Gì - Your Name kể về Mitsuha – nữ sinh trung học sống ở một thị trấn nhỏ của vùng Itomori. Luôn chán chường với cuộc sống tẻ nhạt ở vùng thôn quê, Mitsuha ao ước kiếp sau được làm một anh chàng đẹp trai sống ở thủ đô Tokyo sôi động. Trong khi đó ở Tokyo, anh chàng Taki rất hài lòng với cuộc sống và công việc làm thêm ở một nhà hàng Italy sau giờ học. Tuy vậy, hằng đêm cậu vẫn mơ thấy mình trong cơ thể một cô gái thôn quê. Đến một hôm khi sự kiện nghìn năm có một là Sao Chổi tiến gần tới Trái đất, Taki và Mitsuha bỗng bị hoán đổi cơ thể.', 'Phụ đề Tiếng Việt', 'name.jpg', 'https://www.youtube.com/embed/_mifHzxFNQ4', ''),
(49, 'CON MÈO TRỞ LẠI', 'Nhật Bản', 6, 'Phim lẻ', ' ', 2016, '76 phút', 'Phim Con Mèo Trở Lại được chuyển thể từ loạt manga cùng tên của Hiiragi Aoi. Cốt truyện xoay quanh Haru một nữ sinh trung học sau khi cô cứu được một chú mèo lạ khỏi bị xe tông, cô đã nhận được sự cảm kích của những chú mèo và sau đó cô được đưa đến vương quốc của loài mèo để trở thành vợ của thái tử. Cuộc phiêu lưu của Haru bắt đầu.', 'Phụ đề Tiếng Việt', 'cat.jpg', 'https://www.youtube.com/embed/Gp-H_YOcYTM', ''),
(50, 'TÀU NGẦM SẮT MÀU ĐEN', 'Nhật Bản', 6, 'Phim lẻ', ' ', 2016, '1 tiếng 40 phút', 'Phim Điện Ảnh Thám Tử Lừng Danh Conan: Tàu Ngầm Sắt Màu Đen lấy bối cảnh tại Pacific Buoy - một trụ sở hàng hải của Interpol có nhiệm vụ kết nối các camera an ninh trên toàn thế giới. Nhóm của Conan, theo lời mời của Sonoko, cũng đến đảo Hachijo để xem cá voi. Tại đây, Conan nhận được thông tin về một nhân viên Europol bị ám sát. Cùng với đó, tính mạng Haibara bị đe dọa, phải chăng thân phận của cô đã bị bại lộ trước Gin...', 'Phụ đề Tiếng Việt', 'conan.jpg', 'https://www.youtube.com/embed/0bJXtdfb7hg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `id_product`, `rating`) VALUES
(35, 1, 7),
(36, 1, 10),
(37, 1, 6),
(38, 1, 10),
(39, 2, 10),
(40, 4, 9),
(41, 7, 8),
(42, 1, 9),
(43, 1, 10),
(44, 1, 10),
(45, 1, 10),
(46, 1, 10),
(47, 4, 10),
(48, 1, 9),
(49, 1, 10),
(50, 34, 9),
(51, 2, 8),
(52, 2, 4),
(53, 2, 7),
(54, 4, 10),
(55, 4, 9),
(56, 4, 10),
(57, 3, 10),
(58, 20, 10),
(59, 5, 10),
(60, 5, 10),
(61, 24, 10),
(62, 3, 1),
(63, 1, 10),
(64, 12, 9),
(65, 27, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `maTheloai` int(11) NOT NULL,
  `tenTheloai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`maTheloai`, `tenTheloai`) VALUES
(1, 'Kinh Dị'),
(2, 'Hành Động'),
(3, 'Hài Hước'),
(4, 'Khoa Học Viễn Tưởng'),
(5, 'Tâm lý-Tình cảm'),
(6, 'Hoạt Hình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'ngan', 'ngan@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(4, 'Hương', 'hh567250@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(5, 'Minh', 'minh1234@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(9, 'don', 'don@gmail.com', 'a22e8f88026cd1c926c2ddeaf4629425', 'admin'),
(10, 'dondeptrai', 'don123@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(11, 'dona', 'dona@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(12, 'Oanh', 'mydayoanhh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(13, 'Lan Hương ', 'hoanghuong3011@gmail.com', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `FK_CustomerID` (`id_product`),
  ADD KEY `FK_CustomerID1` (`id_user`);

--
-- Chỉ mục cho bảng `lichsuxemphim`
--
ALTER TABLE `lichsuxemphim`
  ADD PRIMARY KEY (`malichsu`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`maPhim`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`maTheloai`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `lichsuxemphim`
--
ALTER TABLE `lichsuxemphim`
  MODIFY `malichsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `maPhim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_CustomerID` FOREIGN KEY (`id_product`) REFERENCES `phim` (`maPhim`),
  ADD CONSTRAINT `FK_CustomerID1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
