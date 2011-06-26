create table lakshya_newsletter(
	newsletter_id	int unsigned auto_increment,
	email 			varchar(140) not null,
	person_id		int unsigned,
	status			tinyint,
	subscribe_key	varchar(12),
	unsubscribe_key	varchar(12),
	added_at		datetime,
	confirmed_at	datetime,
	primary key(newsletter_id)
);