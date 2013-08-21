<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/profile_main'); ?>

    <?php /*
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>'Operations',
    ));
    $this->widget('zii.widgets.CMenu', array(
        'items'=>$this->menu,
        'htmlOptions'=>array('class'=>'operations'),
    ));
    $this->endWidget(); */
    ?>

<div class="row">
<?php echo $content; ?>
<!-- Левый блок -->
<div class="span6">
    <!-- 1 виджет -->
    <div class="widget stacked">

        <div class="widget-header">
            <i class="icon-star"></i>
            <h3>Quick Stats</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <div class="stats">

                <div class="stat">
                    <span class="stat-value">12,386</span>
                    Site Visits
                </div> <!-- /stat -->

                <div class="stat">
                    <span class="stat-value">9,249</span>
                    Unique Visits
                </div> <!-- /stat -->

                <div class="stat">
                    <span class="stat-value">70%</span>
                    New Visits
                </div> <!-- /stat -->

            </div> <!-- /stats -->


            <div id="chart-stats" class="stats">

                <div class="stat stat-chart">
                    <div id="donut-chart" class="chart-holder" style="padding: 0px; position: relative;"><canvas class="base" width="269" height="100"></canvas><canvas class="overlay" width="269" height="100" style="position: absolute; left: 0px; top: 0px;"></canvas><div class="legend"><div style="position: absolute; width: 55px; height: 72px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:5px;right:5px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(255,153,0);overflow:hidden"></div></div></td><td class="legendLabel">Series 1</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(34,34,34);overflow:hidden"></div></div></td><td class="legendLabel">Series 2</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(119,119,119);overflow:hidden"></div></div></td><td class="legendLabel">Series 3</td></tr></tbody></table></div></div> <!-- #donut -->
                </div> <!-- /substat -->

                <div class="stat stat-time">
                    <span class="stat-value">00:28:13</span>
                    Average Time on Site
                </div> <!-- /substat -->

            </div> <!-- /substats -->

        </div> <!-- /widget-content -->

    </div> <!-- /widget -->
    <!-- Конец первого виджета -->
    <!-- Второй виджет -->

    <div class="widget widget-nopad stacked">

        <div class="widget-header">
            <i class="icon-list-alt"></i>
            <h3>Recent News</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <ul class="news-items">
                <li>

                    <div class="news-item-detail">
                        <a href="javascript:;" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
                        <p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    </div>

                    <div class="news-item-date">
                        <span class="news-item-day">08</span>
                        <span class="news-item-month">Mar</span>
                    </div>
                </li>
                <li>
                    <div class="news-item-detail">
                        <a href="javascript:;" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
                        <p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    </div>

                    <div class="news-item-date">
                        <span class="news-item-day">08</span>
                        <span class="news-item-month">Mar</span>
                    </div>
                </li>
                <li>
                    <div class="news-item-detail">
                        <a href="javascript:;" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
                        <p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    </div>

                    <div class="news-item-date">
                        <span class="news-item-day">08</span>
                        <span class="news-item-month">Mar</span>
                    </div>
                </li>
            </ul>

        </div> <!-- /widget-content -->

    </div> <!-- /widget -->
    <!-- Конец Второй виджет -->
    <!-- Третий виджет -->
    <div class="widget stacked">

        <div class="widget-header">
            <i class="icon-file"></i>
            <h3>Content</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>


            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        </div> <!-- /widget-content -->

    </div> <!-- /widget -->
    <!-- Третий виджет -->
</div> <!-- /span6 -->
<!-- Конец левого блока -->

<!-- Правый блок -->
<div class="span6">


    <div class="widget stacked">

        <div class="widget-header">
            <i class="icon-bookmark"></i>
            <h3>Quick Shortcuts</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <div class="shortcuts">
                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-list-alt"></i>
                    <span class="shortcut-label">Apps</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-bookmark"></i>
                    <span class="shortcut-label">Bookmarks</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-signal"></i>
                    <span class="shortcut-label">Reports</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-comment"></i>
                    <span class="shortcut-label">Comments</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-user"></i>
                    <span class="shortcut-label">Users</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-file"></i>
                    <span class="shortcut-label">Notes</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-picture"></i>
                    <span class="shortcut-label">Photos</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-tag"></i>
                    <span class="shortcut-label">Tags</span>
                </a>
            </div> <!-- /shortcuts -->

        </div> <!-- /widget-content -->

    </div> <!-- /widget -->




    <div class="widget stacked">

        <div class="widget-header">
            <i class="icon-signal"></i>
            <h3>Chart</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">
            <div id="area-chart" class="chart-holder" style="padding: 0px; position: relative;"><canvas class="base" width="538" height="250"></canvas><canvas class="overlay" width="538" height="250" style="position: absolute; left: 0px; top: 0px;"></canvas><div class="tickLabels" style="font-size:smaller"><div class="xAxis x1Axis" style="color:#545454"><div class="tickLabel" style="position:absolute;text-align:center;left:1px;top:228px;width:48px">0</div><div class="tickLabel" style="position:absolute;text-align:center;left:52px;top:228px;width:48px">10</div><div class="tickLabel" style="position:absolute;text-align:center;left:103px;top:228px;width:48px">20</div><div class="tickLabel" style="position:absolute;text-align:center;left:154px;top:228px;width:48px">30</div><div class="tickLabel" style="position:absolute;text-align:center;left:205px;top:228px;width:48px">40</div><div class="tickLabel" style="position:absolute;text-align:center;left:256px;top:228px;width:48px">50</div><div class="tickLabel" style="position:absolute;text-align:center;left:306px;top:228px;width:48px">60</div><div class="tickLabel" style="position:absolute;text-align:center;left:357px;top:228px;width:48px">70</div><div class="tickLabel" style="position:absolute;text-align:center;left:408px;top:228px;width:48px">80</div><div class="tickLabel" style="position:absolute;text-align:center;left:459px;top:228px;width:48px">90</div><div class="tickLabel" style="position:absolute;text-align:center;left:510px;top:228px;width:48px">100</div></div><div class="yAxis y1Axis" style="color:#545454"><div class="tickLabel" style="position:absolute;text-align:right;top:210px;right:520px;width:18px">0</div><div class="tickLabel" style="position:absolute;text-align:right;top:167px;right:520px;width:18px">20</div><div class="tickLabel" style="position:absolute;text-align:right;top:123px;right:520px;width:18px">40</div><div class="tickLabel" style="position:absolute;text-align:right;top:80px;right:520px;width:18px">60</div><div class="tickLabel" style="position:absolute;text-align:right;top:36px;right:520px;width:18px">80</div><div class="tickLabel" style="position:absolute;text-align:right;top:-7px;right:520px;width:18px">100</div></div></div></div>
        </div> <!-- /widget-content -->

    </div> <!-- /widget -->




    <div class="widget stacked widget-table action-table">

        <div class="widget-header">
            <i class="icon-th-list"></i>
            <h3>Table</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Engine</th>
                    <th>Browser</th>
                    <th class="td-actions"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 4.0</td>
                    <td class="td-actions">
                        <a href="javascript:;" class="btn btn-small btn-warning">
                            <i class="btn-icon-only icon-ok"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 5.0</td>
                    <td class="td-actions">
                        <a href="javascript:;" class="btn btn-small btn-warning">
                            <i class="btn-icon-only icon-ok"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 5.5</td>
                    <td class="td-actions">
                        <a href="javascript:;" class="btn btn-small btn-warning">
                            <i class="btn-icon-only icon-ok"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 5.5</td>
                    <td class="td-actions">
                        <a href="javascript:;" class="btn btn-small btn-warning">
                            <i class="btn-icon-only icon-ok"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 5.5</td>
                    <td class="td-actions">
                        <a href="javascript:;" class="btn btn-small btn-warning">
                            <i class="btn-icon-only icon-ok"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 5.5</td>
                    <td class="td-actions">
                        <a href="javascript:;" class="btn btn-small btn-warning">
                            <i class="btn-icon-only icon-ok"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>

        </div> <!-- /widget-content -->

    </div> <!-- /widget -->

</div> <!-- /span6 -->
<!-- Конец правого блока -->
</div> <!-- /row -->
<?php $this->endContent(); ?>