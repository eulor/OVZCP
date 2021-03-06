<div id="sidebarWrapper" class="well affix">
    <ul class="sidebar-nav nav clearfix list-group">
        <li id="index">{{ link_to('index/index', '<i class="fa fa-tachometer fa-fw" aria-hidden="true"></i>&nbsp; <span class="sideBarText">Dashboard</span>', 'title':'Dashboard', 'class':'list-group-item') }}</li>
        <li id="customers">{{ link_to('customers/tabledata', '<i class="fa fa-users fa-fw" aria-hidden="true"></i>&nbsp; <span class="sideBarText">Customers</span>', 'title':'Customers', 'class':'list-group-item') }}</li>
        <li id="colocations">{{ link_to('colocations/slidedata', '<i class="fa fa-globe fa-fw" aria-hidden="true"></i>&nbsp; <span class="sideBarText">Colocations</span>', 'title':'Colocations', 'class':'list-group-item') }}</li>
        <li id="physical_servers">{{ link_to('physical_servers/slidedata', '<i class="fa fa-server fa-fw" aria-hidden="true"></i>&nbsp; <span class="sideBarText">Physical Servers</span>', 'title':'Physical Servers', 'class':'list-group-item') }}</li>
        <li id="virtual_servers">{{ link_to('virtual_servers/slidedata', '<i class="fa fa-cube fa-fw" aria-hidden="true"></i>&nbsp; <span class="sideBarText">Virtual Servers</span>', 'title':'Virtual Servers', 'class':'list-group-item')}}</li>
        <li id="jobs">{{ link_to('jobs/index', '<i class="fa fa-tasks fa-fw" aria-hidden="true"></i>&nbsp; <span class="sideBarText">Jobs</span>', 'title':'Jobs', 'class':'list-group-item') }}</li>
    </ul>
</div>