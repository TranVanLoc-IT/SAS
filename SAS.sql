
GO

/****** Object:  Table [dbo].[users]    Script Date: 6/13/2024 9:10:41 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[email] [nvarchar](255) NOT NULL,
	[email_verified_at] [datetime] NULL,
	[password] [nvarchar](255) NOT NULL,
	[remember_token] [nvarchar](100) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
insert into users values
(N'Van Loc', 'loctranvan23.1.2003@gmail.com', NULL, '$2y$12$fLLANyW5u4KrZcFfVPEtHu9gLlJAxqJgog9C3I2CyNzfHohXSNVRe', NULL, '2024-04-12 10:06:25.620', '2024-04-12 10:06:25.620'),
(N'Trần Văn Lộc', 'loctran23.1.2003@gmail.com', NULL, '$2y$12$3I/k9573oCfqyfLgnkCcn.OWSSI4KPjwoHFKVyYGvBj5IuPnd5b.C', NULL, '2024-04-29 09:46:29.790', '2024-06-07 15:10:51.343');

GO

/****** Object:  Table [dbo].[cache]    Script Date: 6/13/2024 9:17:16 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[cache](
	[key] [nvarchar](255) NOT NULL,
	[value] [nvarchar](max) NOT NULL,
	[expiration] [int] NOT NULL,
 CONSTRAINT [cache_key_primary] PRIMARY KEY CLUSTERED 
(
	[key] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

insert into cache values ('nglghan234@gmail.com|127.0.0.1',	'i:1;',	'1714442874'),
('nglghan234@gmail.com|127.0.0.1:timer'	,'i:1714442874;'	,'1714442874')

GO

/****** Object:  Table [dbo].[cache_locks]    Script Date: 6/13/2024 9:19:30 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[cache_locks](
	[key] [nvarchar](255) NOT NULL,
	[owner] [nvarchar](255) NOT NULL,
	[expiration] [int] NOT NULL,
 CONSTRAINT [cache_locks_key_primary] PRIMARY KEY CLUSTERED 
(
	[key] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

GO

/****** Object:  Table [dbo].[failed_jobs]    Script Date: 6/13/2024 9:20:03 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[failed_jobs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[uuid] [nvarchar](255) NOT NULL,
	[connection] [nvarchar](max) NOT NULL,
	[queue] [nvarchar](max) NOT NULL,
	[payload] [nvarchar](max) NOT NULL,
	[exception] [nvarchar](max) NOT NULL,
	[failed_at] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

ALTER TABLE [dbo].[failed_jobs] ADD  DEFAULT (getdate()) FOR [failed_at]
GO

GO

/****** Object:  Table [dbo].[job_batches]    Script Date: 6/13/2024 9:20:58 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[job_batches](
	[id] [nvarchar](255) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[total_jobs] [int] NOT NULL,
	[pending_jobs] [int] NOT NULL,
	[failed_jobs] [int] NOT NULL,
	[failed_job_ids] [nvarchar](max) NOT NULL,
	[options] [nvarchar](max) NULL,
	[cancelled_at] [int] NULL,
	[created_at] [int] NOT NULL,
	[finished_at] [int] NULL,
 CONSTRAINT [job_batches_id_primary] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

GO

/****** Object:  Table [dbo].[jobs]    Script Date: 6/13/2024 9:21:55 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[jobs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[queue] [nvarchar](255) NOT NULL,
	[payload] [nvarchar](max) NOT NULL,
	[attempts] [tinyint] NOT NULL,
	[reserved_at] [int] NULL,
	[available_at] [int] NOT NULL,
	[created_at] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

GO

/****** Object:  Table [dbo].[sessions]    Script Date: 6/13/2024 9:22:46 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[sessions](
	[id] [nvarchar](255) NOT NULL,
	[user_id] [bigint] NULL,
	[ip_address] [nvarchar](45) NULL,
	[user_agent] [nvarchar](max) NULL,
	[payload] [nvarchar](max) NOT NULL,
	[last_activity] [int] NOT NULL,
 CONSTRAINT [sessions_id_primary] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

insert into sessions values ('tL4YAzRUScMTFZP8HwCBAamv9HuqAVAApeIyoOXT',	2,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicVlJcGZDdDBhQlpVNkR0TXVsS1ZUU3kwVm5QN2FWT090TFZIQWtjbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGllbS1kYW5oL21vbi1ob2M/c3ViamVjdElkPSUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMCUyMDMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=',	1717773159)

GO

/****** Object:  Table [dbo].[password_reset_tokens]    Script Date: 6/13/2024 9:25:15 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[password_reset_tokens](
	[email] [nvarchar](255) NOT NULL,
	[token] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL,
 CONSTRAINT [password_reset_tokens_email_primary] PRIMARY KEY CLUSTERED 
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

insert into password_reset_tokens values('loctranvan23.1.2003@gmail.com',	'$2y$12$o98xT6eM/JBBJbzvr8OJg.uyE/e3vpzhO/POPG9GGL59eADMxMu3m',	'2024-06-07 15:07:51.933')

GO

/****** Object:  Table [dbo].[migrations]    Script Date: 6/13/2024 9:26:41 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[migrations](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[migration] [nvarchar](255) NOT NULL,
	[batch] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
insert into migrations values ('0001_01_01_000000_create_users_table',	1),
('0001_01_01_000001_create_cache_table',	1),
('0001_01_01_000002_create_jobs_table',	1)

CREATE TABLE Parent
(
	parentId int,
	firstName nvarchar(50) not null,
	lastName nvarchar(50) not null,
	phoneNumber varchar(20),
	emailAddress nvarchar(max),
	constraint pk_parentId primary key(parentId)
)
go
CREATE TABLE Student
(
	studentId int,
	firstName nvarchar(50) not null,
	lastName nvarchar(50) not null,
	parentId int,
	birthDay date,
	born nvarchar(50),
	imgCard image not null,
	constraint pk_stuId primary key(studentId),
	constraint fk_parentId_student foreign key (parentId) references Parent (parentId)
)
GO
CREATE TABLE AbsenceReason
(
	absenceReasonId int,
	reason nvarchar(max) not null,
	constraint pk_reasonId primary key (absenceReasonId)
)
go
CREATE TABLE Teacher
(
	teacherId int,
	firstName nvarchar(50) not null,
	lastName nvarchar(50) not null,
	phoneNumber varchar(20),
	emailAdress varchar(max),
	constraint pk_teacherId primary key (teacherId)
)
go

Create table Semester
(
	semesterId int identity(1,1) primary key,
	semester nvarchar(20) not null,
	is_active bit default 0
)
go
CREATE TABLE [Subject](
	subjectId INT,
	subjectName nvarchar(max) not null,
	lessonQuantity tinyint,
	semesterId int,
	constraint pk_subId primary key(subjectId),
	constraint fk_semester_subject foreign key (semesterId) references semester(semesterId)
)
go
-- dk dạy

go
CREATE TABLE TeacherHasSubject
(
	teacherId int,
	subjectId int,
	constraint pk_teacherhassubject primary key(teacherId, subjectId),
	constraint fk_teacherId_teacherhassubject foreign key (teacherId) references Teacher (teacherId),
	constraint fk_subjectId_teacherhassubject foreign key(subjectId) references Subject(subjectId)
)
GO

/****** Object:  Table [dbo].[StudentHasSubject]    Script Date: 6/7/2024 10:24:58 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[StudentHasSubject](
	[studentId] [int] NULL,
	[subjectId] [int] NULL,
	[teacherId] [int] NULL
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[StudentHasSubject]  WITH CHECK ADD  CONSTRAINT [fk_subjectId_studenthassubject] FOREIGN KEY([subjectId])
REFERENCES [dbo].[Subject] ([subjectId])
GO

ALTER TABLE [dbo].[StudentHasSubject] CHECK CONSTRAINT [fk_subjectId_studenthassubject]
GO

ALTER TABLE [dbo].[StudentHasSubject]  WITH CHECK ADD  CONSTRAINT [fk_teacher_id_from_sts] FOREIGN KEY([teacherId])
REFERENCES [dbo].[Teacher] ([teacherId])
GO

ALTER TABLE [dbo].[StudentHasSubject] CHECK CONSTRAINT [fk_teacher_id_from_sts]
GO

ALTER TABLE [dbo].[StudentHasSubject]  WITH CHECK ADD  CONSTRAINT [fk_teacherId_studenthassubject] FOREIGN KEY([studentId])
REFERENCES [dbo].[Student] ([studentId])
GO

ALTER TABLE [dbo].[StudentHasSubject] CHECK CONSTRAINT [fk_teacherId_studenthassubject]
GO


-- dk học
go
CREATE TABLE LessonShift(
	shiftId int primary key,
	start_time time,
	end_time time,
)
go

Go
CREATE TABLE Lesson
(
	lessonId CHAR(5),
	dateActive date unique,
	teacherId int,
	lesson_content nvarchar(max),
	shiftId int,
	location nvarchar(20),
	subjectId int,
	constraint pk_lessonId primary key (lessonId),
	constraint fk_subjectId_lesson foreign key (subjectId) references [Subject](subjectId),
	constraint fk_teacherId_lesson foreign key (teacherId) references Teacher(teacherId),
	
	constraint fk_shiftId_lesson foreign key (shiftId) references LessonShift(shiftId)
)
GO
CREATE TABLE Attendance
(
	attendanceId int,
	lessonId char(5),
	studentId int,
	present bit default 0,
	isBlock bit default 0,
	absenceReasonId int,
	constraint pk_attendanceId primary key (attendanceId),
	constraint fk_absenceReasonId_attendance foreign key(absenceReasonId) references AbsenceReason(absenceReasonId),
	
	constraint fk_studentId_attendance foreign key(studentId) references Student(studentId),
	
	constraint fk_lessonId_attendance foreign key(lessonId) references Lesson(lessonId)
)
-- INSERT DATA

-- INSERT DATA
set dateformat dmy
INSERT INTO Parent VALUES (0001,N'Nguyễn Văn',N'An','0356479080',N'ngvanan21@gmail.com'),
						  (0002,N'Nguyễn Văn',N'Ngọc Ngân','0356479112',N'ngngocngan3@gmail.com'),
						  (0003,N'Lê Văn',N'An','0356465789',N'lean90@gmail.com'),
						  (0004,N'Trịnh Như',N'Ánh Hương','0890878654',N'trinhhuong09@gmail.com'),
						  (0005,N'Huỳnh Thị',N'Ngọc Quỳnh','0903546789',N'ngocquynhiu@gmail.com'),
						  (0006,N'Trần Văn',N'Tịnh','0987654321',N'tinhtran89@gmail.com'),
						  (0007,N'Trần Ngọc',N'Nghi','098765432',N'ngocnghi87@gmail.com'),
						  (0008,N'Phạm Văn',N'Đam','0765432890',N'vandam@gmail.com'),
						  (0009,N'Võ Ngọc',N'Như','0654321789',N'nhungoc56@gmail.com')

						  
INSERT INTO Student VALUES (2001215931,N'Trần Văn',N'Lộc',0002,'23/01/2003',N'Hà Nội',''),
						   (2001215757,N'Trần Văn',N'Nghi',0001,'31/10/2002',N'Bình Định',''),
						   (2001215667,N'Đào Văn',N'An',0003,'10/10/2002',N'Nha Trang',''),
						   (2001215908,N'Nguyễn Thị',N'Hà',0004,'24/04/2003',N'Bình Định',''),
						   (2001216432,N'Phạm Thị Ngọc',N'Hằng',0006,'23/03/2001',N'Bình Thuận',''),
						   (2001216890,N'Trần Ngọc',N'Tính',0002,'08/09/2004',N'Hà Nội',''),
						   (2001211263,N'Hồ Văn',N'Dũng',0005,'',N'Nam Định',''),
						   (2001212789,N'Trần Ngọc',N'Trân',0001,'08/02/2003',N'Bình Định',''),
						   (2001210988,N'Nguyễn Văn',N'Minh',0003,'15/07/2002',N'Nha Trang',''),
						   (2001215987,N'Phạm Văn',N'Nam',0004,'14/03/2003',N'Bình Định',''),
						   (2001215567,N'Ninh Ngọc',N'Hiếu',0005,'12/01/2001',N'Nam Định',''),
						   (2001210002,N'Trịnh Thị',N'Lợi',0006,'23/01/2001',N'Bình Thuận',''),
						   (2001210021,N'Trần Minh',N'Chiến',0007,'19/09/2004',N'Đà Nẵng',''),
						   (2001210129,N'Trịnh Minh',N'Văn',0008,'22/02/2005',N'Lâm Đồng',''),
						   (2001214788,N'Võ Văn',N'Chính',0009,'28/07/2003',N'Long An','')

INSERT INTO Teacher VALUES (001,N'Vũ Văn',N'Vinh','0967894909','vinhvv21@gmail.com'),
						   (002,N'Trần Văn',N'Lộc','0876543808','vanlochuit@gmail.com'),
						   (003,N'Lâm Thị',N'Nhàn','0904678590','nhanthi89@gmail.com'),
						   (004,N'Phạm Tuấn',N'Khanh','0806456321','khanhpham@gmail.com'),
						   (005,N'Nguyễn Đinh',N'Nhân','0867890060','nhandinh67@gmail.com'),
						   (006,N'Bùi Văn',N'Minh','0965784899','minhvan@gmail.com'),
						   (007,N'Nguyễn Thị',N'Bích Ngọc','0678435674','ngocbich90@gmail.com')

insert into semester(semester, is_active) values('HK2 2023-2024', 1), ('HK3 2023-2024', 0), ('HK1 2024-2025', 0),('HK1 2024-2025', 0)

INSERT INTO [Subject] VALUES (1,N'Cấu trúc dữ liệu',5,1),
						   (2,N'Thể chất cầu lông',4,1),
						   (3,N'Lập trình di động',4,1),
						   (4,N'Tư tưởng HCM',3,1),
						   (5,N'Lịch sử Đảng',2,1)

INSERT INTO TeacherHasSubject VALUES (001,1),
									 (002,3),
									 (003,2),
									 (004,4),
									 (005,5),
									 (006,2),
									 (007,1),(3, 4),
									(2,	2),
									(2, 4)

INSERT INTO StudentHasSubject VALUES (2001215931,1, 001),
									 (2001215757,2, 003),
									 (2001215667,2, 003),
									 (2001215908,1, 007),
									 (2001216432,3, 002),
									 (2001216890,4, 004),
									 (2001211263,4, 004),
									 (2001212789,1, 006),
									 (2001210988,4, 004),
									 (2001215987,3,002),
									 (2001215567,1, 001),
									 (2001210002,4, 004),
		 						     (2001210021,1, 005),
									 (2001210129,2, 006),
									 (2001214788,1, 007)


insert into LessonShift values(1,'7:00', '9:15'),
								(2,'9:30', '11:30'),(3,'13:00', '2:45'),(4,'15:00', '17:15')
								,(5,'7:00', '8:30'),(6,'18:00', '20:30'),(7,'7:00', '10:45'),(8,'13:00', '16:15'),(9,'18:00', '21:45')


INSERT INTO lesson (lessonId, dateActive, teacherId, subjectId, lesson_content, shiftId, location) VALUES
('BG003', '2024-06-04', 2, 3, 'học c5', 2, 'P A201 Tòa A'),
('BG008', '2024-06-06', 2, 3, 'học chương 1', 2, 'P A201 Tòa A'),
('BG009', '2024-06-05', 2, 3, 'Học chương 1', 3, 'P A201 Tòa A'),
('BG001', '2020-02-20', 1, 1, NULL, 1, 'P A201 Tòa A'),
('BG010', '2024-06-02', 2, 3, NULL, 2, 'P A201 Tòa A'),
('BG011', '2024-06-20', 2, 3, NULL, 3, 'P A201 Tòa A'),
('BG012', '2024-06-06', 2, 3, NULL, 3, 'P A201 Tòa A'),
('BG013', '2024-06-09', 2, 4, NULL, 3, 'P A201 Tòa A'),
('BG014', '2024-06-17', 2, 4, NULL, 3, 'P A201 Tòa A'),
('BG015', '2024-06-24', 2, 4, NULL, 3, 'P A201 Tòa A'),
('BG016', '2024-06-30', 2, 4, NULL, 3, 'P A201 Tòa A'),
('BG017', '2024-06-06', 2, 2, NULL, 3, 'P A201 Tòa A'),
('BG018', '2024-06-11', 2, 2, NULL, 3, 'P A201 Tòa A'),
('BG019', '2024-06-18', 2, 2, NULL, 3, 'P A201 Tòa A'),
('BG002', '2021-04-20', 6, 2, NULL, 1, 'P A201 Tòa A'),
('BG020', '2024-06-25', 2, 2, NULL, 3, 'P A201 Tòa A'),
('BG004', '2021-09-19', 3, 2, NULL, 1, 'P A201 Tòa A'),
('BG005', '2020-10-10', 4, 4, NULL, 6, 'P F301 Tòa F'),
('BG006', '2023-10-31', 5, 5, NULL, 4, 'P B304 Tòa B'),
('BG007', '2020-02-20', 7, 1, NULL, 1, 'P A201 Tòa A');
GO
-- FUNCTION
GO
CREATE PROC GenerateAbsenceReasonId(@absenceReasonId int output) 
AS
BEGIN
	SET @absenceReasonId = (SELECT RAND()*(9999-1000)+1000);
	while 1=1
	begin
		IF NOT EXISTS(SELECT *FROM AbsenceReason WHERE absenceReasonId = @absenceReasonId)
		begin
			RETURN @absenceReasonId;
		end
		SET @absenceReasonId = (SELECT RAND()*(9999-1000)+1000);
	end
END
go
create PROC GenerateAttendId(@attendId int output) 
AS
BEGIN
	SET @attendId = (SELECT RAND()*(9999-1000)+1000);
	while 1=1
	begin
		IF NOT EXISTS(SELECT *FROM Attendance WHERE attendanceId = @attendId)
		begin
			RETURN @attendId;
		end
		SET @attendId = (SELECT RAND()*(9999-1000)+1000);
	end
END
GO
-- PROCEDURE
create PROC GetSubjectInfo(@subjectId int, @teacherId int)
as
begin
	SELECT subjectName, semester FROM [Subject]
	INNER JOIN TeacherHasSubject
	ON TeacherHasSubject.subjectId = [Subject].subjectId
	INNER JOIN StudentHasSubject
	ON TeacherHasSubject.teacherId = StudentHasSubject.teacherId
	INNER JOIN Student
	ON StudentHasSubject.studentId = Student.studentId
	INNER JOIN Semester
	ON Semester.semesterId = [Subject].semesterId
	where [TeacherHasSubject].subjectId = @subjectId
	and [TeacherHasSubject].teacherId = @teacherId
	and [Subject].subjectId = @subjectId
	group by subjectName, semester
end
go
create PROC GetStudentList(@subjectId int, @teacherId int)
as
begin
	SELECT student.studentId, student.firstName, student.lastName FROM Student
	INNER JOIN StudentHasSubject
	ON StudentHasSubject.studentId = Student.studentId
	WHERE StudentHasSubject.teacherId = @teacherId
	and StudentHasSubject.subjectId = @subjectId
	group by student.studentId, student.firstName, student.lastName 
end
go
create PROC GetLessonList(@subjectId int, @teacherId int)
as
begin
	SELECT distinct lesson.lessonId, lesson.dateActive FROM Lesson
	where subjectId = @subjectId
	AND teacherId = @teacherId
	order by dateactive asc
end
GO

create PROC GetSubjectList(@teacherId int)
as
begin
	SELECT [Subject].subjectId,[Subject].subjectName from TeacherHasSubject
	INNER JOIN [Subject]
	ON [Subject].subjectId = TeacherHasSubject.subjectId
	INNER JOIN Semester
	ON Semester.semesterId = [Subject].semesterId
	where TeacherHasSubject.teacherId = @teacherId
	and is_active = 1
	group by [Subject].subjectId, [Subject].subjectName
end
go
Create proc GetSchedule(@teacherId int, @limit int = 0)
as
begin
	if(@limit = 0)
	begin
		
		select Lesson.*, convert(varchar, start_time, 108) as start_time
		, convert(varchar, end_time, 108) as end_time, location, subjectName, [Subject].subjectId from Lesson, LessonShift, [Subject]
		where teacherId=@teacherId and  LessonShift.shiftId = Lesson.shiftId and
		Lesson.subjectId = [Subject].subjectId order by dateactive asc
	end
	else
	begin
			DECLARE @sql NVARCHAR(MAX);
			SET @sql = N'SELECT TOP (@limit) Lesson.*, 
                   CONVERT(VARCHAR, start_time, 108) AS start_time, 
                   CONVERT(VARCHAR, end_time, 108) AS end_time, 
                   location, 
                   subjectName, 
                   [Subject].subjectId 
            FROM Lesson
            JOIN LessonShift ON LessonShift.shiftId = Lesson.shiftId
            JOIN [Subject] ON Lesson.subjectId = [Subject].subjectId
            WHERE teacherId = @teacherId
            ORDER BY dateactive ASC';
		EXEC sp_executesql @sql, N'@limit INT, @teacherId INT', @limit, @teacherId;
	end
end
go
create PROC AttendanceStudent(@studentId int, @lessonId char(10), @status bit, @reason nvarchar(max))
as
begin
	set TRAN isolation level READ COMMITTED;
	BEGIN TRAN
	BEGIN TRY
		DECLARE @attendId int
		exec GenerateAttendId @attendId = @attendId out
		if(@reason <> '' or @status = 0)
		begin
			DECLARE @absenceReasonId int
			exec GenerateAbsenceReasonId @absenceReasonId = @absenceReasonId out
			insert into AbsenceReason values (@absenceReasonId, @reason)
			insert into Attendance(attendanceId, lessonId, studentId, present, absenceReasonId) values(@attendId, @lessonId, @studentId, @status, @absenceReasonId);
			commit tran
			RETURN 1
		end
		else
		begin
			insert into Attendance(attendanceId, lessonId, studentId, present) values(@attendId, @lessonId, @studentId, @status);
			commit tran
			RETURN 1
		end
	END TRY
	BEGIN CATCH
		ROLLBACK TRAN
		RETURN 0
	END CATCH
end
GO
Create proc GetScheduleToday(@teacherId int)
as
begin
	select Lesson.*, convert(varchar, start_time, 108) as start_time
	, convert(varchar, end_time, 108) as end_time, location, subjectName, [Subject].subjectId from Lesson, LessonShift, [Subject]
	where teacherId=@teacherId and  LessonShift.shiftId = Lesson.shiftId and
	Lesson.subjectId = [Subject].subjectId
	and dateActive = CONVERT(char(10), GetDate(),126);
end
go
-- function
go
-- TRIGGER
CREATE TRIGGER UpdateAttendance ON Attendance
AFTER UPDATE
as
begin
	DELETE AbsenceReason where absenceReasonId = (select absenceReasonId from deleted)
end
go

go
create FUNCTION GetTotalStudentLearning(@teacherId int) RETURNS INT
AS
BEGIN
RETURN(
Select count(studentId) as tongsv from teacherhassubject, studenthassubject, subject, semester
Where teacherhassubject.teacherId = studenthassubject.teacherId
and semester.is_active = 1 and subject.subjectId = teacherhassubject.subjectId
And semester.semesterId = subject.semesterId and teacherhassubject.teacherId = @teacherId)
END
-- chuyen can
go
create function SubjectAttendance(@subjectId int) RETURNS TABLE
AS
	RETURN (
	SELECT Student.studentId, firstName + ' ' + lastName as studentName, lesson.lessonId, lesson.dateActive, present
	FROM [Subject]
	right JOIN Lesson
	ON Lesson.subjectId = Subject.subjectId
	left join attendance
	on attendance.lessonId = Lesson.lessonId
	left join student
	on student.studentId = attendance.studentId
	where [Subject].subjectId = @subjectId
)
go
-- so mon giang day
Create FUNCTION GetTotalSubjectSemester(@semesterId int, @teacherId int) RETURNS INT
AS
begin
RETURN(
	Select count(*) as totalSubject from teacherhassubject, subject, semester
	Where semester.is_active = 1 and subject.subjectId = teacherhassubject.subjectId
	And semester.semesterId = subject.semesterId
	And teacherhassubject.teacherid = @teacherId
	and semester.semesterId = @semesterId
	)
end

go
Create proc GetStudentDiligent(@studentId int)
as
begin
	select count(*) as totalPresent,(select count(*) from Attendance
	where studentId = @studentId and present = 0) as totalAbsent from Attendance
	where studentId = @studentId and present = 1
end

GO
create proc GetShortSubjectDiligent(@subjectId int)
as
begin
	select dateActive, lesson_content, present as totalPresent, (select count(*) from StudentHasSubject where subjectId = @subjectId) as totalStudent from attendance
	right join lesson
	on Attendance.lessonId = lesson.lessonId where lesson.subjectId = @subjectId
	group by dateActive, lesson_content, present
end
go
create proc GetStudentLearning(@teacherId int)
as
begin
	select count(*) as sv_learning from semester, subject, TeacherHasSubject, StudentHasSubject
	where semester.semesterId = Subject.semesterId
	and TeacherHasSubject.subjectId = subject.subjectId
	and TeacherHasSubject.teacherId =@teacherId
	and StudentHasSubject.subjectId = subject.subjectId
	and semester.is_active = 1
	group by semester.semesterId

end
go
create proc GetStudentLearnt(@teacherId int)
as
begin
	select count(*) as sv_learnt from semester, subject, TeacherHasSubject, StudentHasSubject
	where semester.semesterId = Subject.semesterId
	and TeacherHasSubject.subjectId = subject.subjectId
	and TeacherHasSubject.teacherId = @teacherId
	and StudentHasSubject.subjectId = subject.subjectId
	and semester.is_active = 0
	group by semester.semesterId
end
go
create proc GetStudentOff(@teacherId int)
as
begin
	select count(*) as sv_learning from StudentHasSubject,Subject, TeacherHasSubject, Attendance, Lesson
	where Attendance.lessonId = Attendance.lessonId
	and StudentHasSubject.subjectId = Subject.subjectId
	and TeacherHasSubject.subjectId = subject.subjectId
	and subject.subjectId = lesson.subjectId
	and StudentHasSubject.studentId = attendance.studentId
	and TeacherHasSubject.teacherId = 2
	and present = 0
	group by StudentHasSubject.subjectId
end
