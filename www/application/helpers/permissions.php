<?php
class permissions {
	
	/**
	 * Permission to change any user's permissions
	 */
	const USERS_PERMISSIONS	= 0x1;
	
	/**
	 * Permission to disable any user's account
	 */
	const USERS_DISABLE		= 0x2;
	
	/**
	 * Permission to (lazy) delete any user's account
	 */
	const USERS_DELETE		= 0x4;
	
	/**
	 * Permission to view the list of all users
	 */
	const USERS_VIEW		= 0x8;
	
	/**
	 * Permission to send newsletter to subscribers
	 */
	const NEWSLETTER_SEND			= 0x10;
	/**
	 * Permission to unsubscribe a newsletter subscriber
	 */
	const NEWSLETTER_UNSUBSCRIBE	= 0x20;
	/**
	 * Permission to view newsletter subscribers / unsubscribers / reason for unsubscription
	 */
	const NEWSLETTER_VIEW			= 0x40;
	
	/**
	 * Permission to add a testimonial
	 */
	const TESTIMONIAL_ADD			= 0x80;
	/**
	 * Permission to view all user's testimonials
	 */
	const TESTIMONIAL_VIEW			= 0x100;
	
	/**
	 * Permission to add an expense report
	 */
	const EXPENSE_ADD		= 0x200;
	/**
	 * Permission to edit any expense report
	 */
	const EXPENSE_EDIT		= 0x400;
	/**
	 * Permission to delete (permanently)  any expense report
	 */
	const EXPENSE_DELETE	= 0x800;
	/**
	 * Permission for detailed view of expense reports
	 */
	const EXPENSE_VIEW		= 0x1000;
	
	/**
	 * Permission to (manually) add a Monetary donation detail
	 */
	const MONEY_DONATION_ADD	= 0x2000;
	/**
	 * Permission to edit a monetary donation detail
	 */
	const MONEY_DONATION_EDIT	= 0x4000;
	/**
	 * Permission to delete (permananently) any monetary donation
	 */
	const MONEY_DONATION_DELETE	= 0x8000;
	/**
	 * Permission for detailed view of monetary donations
	 */
	const MONEY_DONATION_VIEW	= 0x10000;
	
	/**
	 * Permission to (manually) add a book donation
	 */
	const BOOK_DONATION_ADD		= 0x20000;
	/**
	 * Permission to edit any book donation
	 */
	const BOOK_DONATION_EDIT	= 0x40000;
	/**
	 * Permission to delete any book donation
	 */
	const BOOK_DONATION_DELETE	= 0x80000;
	/**
	 * Permission for detailed view of book donations
	 */
	const BOOK_DONATION_VIEW	= 0x100000;
	
	/**
	 * Permission to (manually) add clothes donation
	 */
	const CLOTHES_DONATION_ADD		= 0x200000;
	/**
	 * Permission to edit any clothes donation
	 */
	const CLOTHES_DONATION_EDIT		= 0x400000;
	/**
	 * Permission to delete (permananently) any clothes donation
	 */
	const CLOTHES_DONATION_DELETE	= 0x800000;
	/**
	 * Permission for detailed view of clothes donation
	 */
	const CLOTHES_DONATION_VIEW		= 0x1000000;
	
	/**
	 * Permission to update the beta site from the repository
	 */
	const UPDATE_BETA	= 0x2000000;
	/**
	 * Permission to upgrade a beta site to the main site
	 */
	const UPDATE_MAIN	= 0x4000000;
	
	// Unused values (for future): 0x8000000, 0x10000000, 0x20000000, 0x40000000, 0x80000000
}
?>