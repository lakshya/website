create table users(
	id			int unsigned auto_increment,
	username	varchar(24),	/* unique username */
	password	varchar(56),	/* hashed password */
	email		varchar(128),	/* email address (unique) */
	status		int unsigned,	/* account status */
	permissions	int unsigned,	/* list of permissions of this user */
	added_at	datetime,		/* account creation time */
	last_login	datetime,		/* last time of login */
	primary key(id),
	unique key(username),
	unique key(email)
)ENGINE = InnoDB;

create table profiles(
	id				int unsigned auto_increment,
	user_id			int unsigned,
	first_name		varchar(56),
	last_name		varchar(24),
	mobile			varchar(15),
	relation_nitw	varchar(10),	/* nitw alumni or not */
	updates			bool,			/* receive updates through email? */
	roll_no			varchar(15),	/* college roll no. */
	branch			varchar(24),	/* branch studied in college */
	pass_year		year,			/* year of passing from college */
	address			text,			/* street address */
	city			varchar(48),	
	province		varchar(48),
	zip_code		varchar(48),
	country			varchar(48),
	other_details	text,
	primary key(id),
	foreign key(user_id) references users(id) on delete cascade on update cascade
)ENGINE = InnoDB;

create table testimonials(
	id			int unsigned auto_increment,
	user_id		int unsigned,
	added_at	datetime,
	content		text,	/* content of the testimonial */
	primary key(id),
	foreign key(user_id) references users(id) on delete set null on update cascade
)ENGINE = InnoDB;

create table expenses(
	id				int unsigned auto_increment,
	amount			int unsigned,
	title			varchar(128),
	expense_date	date,
	details			text,
	document		varchar(128),
	added_at		datetime,
	primary key(id)
)ENGINE = InnoDB;

create table books(
	id			int unsigned auto_increment,
	title		varchar(128),	/* book title */
	category	varchar(3),		/* academic or non-academic */
	primary key(id)
)ENGINE = InnoDB;

create table authors(
	id		int unsigned auto_increment,
	name	varchar(56), /* name of the author */
	primary key(id)
)ENGINE = InnoDB;

create table authors_books(
	author_id	int unsigned,	/* book author */
	book_id		int unsigned,	/* book id */
	foreign key(book_id) references books(id) on delete cascade on update cascade,
	foreign key(author_id) references authors(id) on delete cascade on update cascade
)ENGINE = InnoDB;

create table money_donations(
	id				int unsigned auto_increment,
	user_id			int unsigned,
	amount			numeric(10,2) unsigned,	/* amount of donation in INR */
	donation_date	date,					/* date of donation received */
	anonymous		bool,					/* keep this donation anonymous */
	payment_mode	varchar(24),			/* mode of donation: cash / cheque / ccavenue / NEFT */
	details			text,					/* additional details */
	added_at		datetime,
	primary key(id),
	foreign key(user_id) references users(id) on delete set null on update cascade
)ENGINE = InnoDB;

create table book_donations(
	id				int unsigned auto_increment,
	book_id			int unsigned,	
	user_id			int unsigned,	/* donor id */
	copies			int unsigned,	/* no. of copies */
	status			int unsigned,	/* status can be: pending, donated, cancelled */
	donation_date	date,			/* pledged date of donation */
	email			varchar(128),
	contact_number	varchar(15),
	address			text,			/* address to collect the book */
	instructions	text,			/* additional instructions, if any */
	anonymous		bool,			/* keep this donation anonymous */
	added_at		datetime,
	modified_at		datetime,
	primary key(id),
	foreign key(book_id) references books(id) on delete cascade on update cascade,
	foreign key(user_id) references users(id) on delete set null on update cascade
)ENGINE = InnoDB;

create table cloth_donations(
	id				int unsigned auto_increment,
	user_id			int unsigned,
	num_clothes		smallint unsigned,
	donation_date	date,
	status			varchar(12),
	email			varchar(128),
	contact_number	varchar(15),
	address			text,
	instructions	text,
	anonymous		bool,	/* keep this donation anonymous */
	added_at		datetime,
	modified_at		datetime,
	primary key(id),
	foreign key(user_id) references users(id) on delete set null on update cascade
)ENGINE = InnoDB;

create table newsletter_subscriptions(
	id			int unsigned auto_increment,
	pass_key	varchar(56),	/* a unique identifier to facilitate unsubscribe */
	email		varchar(128),
	status		varchar(3),		/* can be: active, pending or cancelled */
	added_at	datetime,
	last_mail	datetime,		/* last time, when a newsletter is sent to the recipient */
	primary key(id),
	unique key(pass_key),
	unique key(email)
)ENGINE = InnoDB;

create table newsletter_unsubscriptions(
	id				int unsigned auto_increment,
	subscription_id	int,
	reason			text,	/* reason of unsubscription */
	added_at		datetime,
	primary key(id),
	foreign key(subscription_id) references newsletter_subscribers(id) on delete cascade on update cascade
)ENGINE = InnoDB;

create table confirmations(
	id				int unsigned auto_increment,
	type			varchar(3),		/* type represents newsletter, forgot password, new account activation */
	email			varchar(128),	/* email address to send to */
	hash			varchar(50),	/* activation key - randomly generated */
	added_at		datetime,		/* time of key generation */
	expires_at		datetime,		/* expiration time of the activation key */
	confirmed_at	datetime,		/* time of key confirmation */
	primary key(id)
)ENGINE = InnoDB;

create table upgrades(
	id			int unsigned auto_increment,
	name		varchar(48), 					/* represents the unique name of the upgrade */
	added_at	datetime, 						/* time of upgradation */
	primary key(id),
	unique key(name)
)ENGINE = InnoDB;