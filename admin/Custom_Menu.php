<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Custom_Menu {
	public function __construct() {
		$this->create_custom_cpt();
	}

	public function create_custom_cpt() {
		add_menu_page(
			__( 'Ticket Codes', 'textdomain' ),
			'Ticket Codes',
			'manage_options',
			'wooextend-tickets.php',
			array( $this, 'ticket_code_cb' ),
			'dashicons-tickets-alt',
			6
		);
	}

	public function ticket_code_cb() {
		$html = '
	<div class="wrapper">
	<h1 class="wp-heading-inline">' . __( 'Ticket Codes', 'woo-extend' ) . '</h1>
	<ul class="subsubsub">
    <li class="all"> All (29)</li>
</ul>
	<table class="wp-list-table widefat fixed striped posts">
    <thead>
        <tr>
            <th scope="col" id="author" class="manage-column column-author">#</th>
            <th scope="col" id="categories" class="manage-column column-categories">Product ID</th>
            <th scope="col" id="comments" class="manage-column column-comments num sortable desc"><span><span
                            class="vers" title="Comments">Product codes<span
                                class="screen-reader-text">Product Codes</span></span></span><span
                        class="sorting-indicator"></span></th>
            <th scope="col" id="date" class="manage-column column-date sortable asc"><a
                    href="http://wpm.test/wp-admin/edit.php?orderby=date&amp;order=desc"><span>Date</span><span
                        class="sorting-indicator"></span></a></th>
        </tr>
    </thead>

    <tbody id="the-list">
        <tr  class="iedit">

           
            <td class="author column-author" data-colname="Author"><a
                    href="edit.php?post_type=post&amp;author=1">admin</a></td>
            <td class="categories column-categories" data-colname="Categories"><a
                    href="edit.php?category_name=uncategorized">Uncategorized</a></td>
            <td class="comments column-comments" data-colname="Comments">
                <div class="post-com-count-wrapper">
                    <a href="http://wpm.test/wp-admin/edit-comments.php?p=1&amp;comment_status=approved"
                        class="post-com-count post-com-count-approved"><span class="comment-count-approved"
                            aria-hidden="true">1</span><span class="screen-reader-text">1 comment</span></a><span
                        class="post-com-count post-com-count-pending post-com-count-no-pending"><span
                            class="comment-count comment-count-no-pending" aria-hidden="true">0</span><span
                            class="screen-reader-text">No pending comments</span></span> </div>
            </td>
            <td class="date column-date" data-colname="Date">Published<br><span
                    title="2020/07/16 7:00:39 am">2020/07/16</span></td>
        </tr>
    </tbody>

    <tfoot>
        <tr>
            <th scope="col" class="manage-column column-author">Author</th>
            <th scope="col" class="manage-column column-categories">Categories</th>
			<th scope="col" id="comments" class="manage-column column-comments num sortable desc"><span><span
			class="vers" title="Comments">Product codes<span
				class="screen-reader-text">Product Codes</span></span></span><span
		class="sorting-indicator"></span></th>
            <th scope="col" class="manage-column column-date sortable asc"><a
                    href="http://wpm.test/wp-admin/edit.php?orderby=date&amp;order=desc"><span>Date</span><span
                        class="sorting-indicator"></span></a></th>
        </tr>
    </tfoot>

</table>
	</div>
		';
		echo $html;
	}
}

new Custom_Menu();
