<?php 
/**
 * File name: $HeadURL: svn://tools.janguo.de/jacc/trunk/admin/templates/modules/tmpl/default.php $
 * Revision: $Revision: 147 $
 * Last modified: $Date: 2013-10-06 10:58:34 +0200 (So, 06. Okt 2013) $
 * Last modified by: $Author: michel $
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license 
 */
defined('_JEXEC') or die('Restricted access'); 
?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel tiles">
				<div class="panel-heading text-center">
					<h2>پخش</h2>
				</div>
				<div class="tiles">
					<ul class="list-unstyled list-inline text-center">
						<li>
							<a class="load-item" href="<?php echo JURI::base() . 'broadcast/introduction/289/%D9%BE%D8%AE%D8%B4'; ?>" data-caturl="<?php echo JURI::base() . 'broadcast/introduction?format=raw'; ?>" data-catid="21">
								<span class="icon">
									<i class="icon-group"></i>
								</span>
								<span class="title">آشنایی</span>
							</a>
						</li>
						<li>
							<a class="load-item" href="<?php echo JURI::base() . 'broadcast/join/297/فرم-عضویت'; ?>" data-caturl="<?php echo JURI::base() . 'broadcast/join?format=raw'; ?>" data-catid="22">
								<span class="icon">
									<i class="icon-user-add"></i>
								</span>
								<span class="title">عضویت</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="itemlist" style="display: none;">
					<div class="close">&times;</div>
					<div class="inner" style="display: none"></div>
				</div>
			</div>
		</div>
	</div>
</div>