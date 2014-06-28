<?php
class Menu
{
	private $loader;
	private $page;
	private $module;

	public function __construct ($menu, $page, $module) 
	{
		global $loader;

		$this->loader = $loader;
		$this->menu = $menu;
		$this->page = $page;
		$this->module = $module;

		if (isset($this->loader->keep_url) && $this->loader->keep_url === true)
		{
			echo '<?php Menu::make($config["menu"]["' . $this->loader->module . '"], $page, $module); ?>';
		}

		$this->makeMenu();
	}

	public static function make($menu, $page, $module)
	{
		return new static($menu, $page, $module);
	}

	public function makeMenu() 
	{
		global $skins;

		foreach ($this->menu as $menu) {
			$menuId = 'menu-' . md5(time() . mt_rand(0, 1000000));
			$menuClass = array();
			$menuCollapseClass = array('collapse');
			$menuCollapse = isset($menu['type']) && $menu['type'] == 'collapse';
			$menuLabel = true;
			$menuFile = false;

			if (isset($menu['file']) && $menu['file'] !== false)
			{
				$menuFile = $this->module . DS . 'menus' . DS . $menu['file'];
				$menuLabel = false;
			}

			if (isset($menu['class']))
				$menuClass[] = $menu['class'];

			if ($menuCollapse)
				$menuClass[] = 'hasSubmenu';

			if ($menuCollapse && in_array_r($this->page, $menu['page']))
			{
				$menuClass[] = 'active';
				$menuCollapseClass[] = 'in';
			}

			if (!$menuCollapse && isset($menu['page']) && $this->page == $menu['page'])
				$menuClass[] = 'active';
			?>
			<li class="<?php echo implode(" ", $menuClass); ?>">

				<?php 
				$href = '';
				if ($menuCollapse) $href .='#' . $menuId; 
				if (!$menuCollapse) 
				{
					if (isset($menu['href']))
						$href = $menu['href'];
					else
						$href .= getURL(array($menu['page']));
				}

				if (isset($menu['page']) || isset($menu['href'])): ?>
				<a href="<?php echo $href; ?>"<?php if ($menuCollapse): ?> data-toggle="collapse"<?php endif; ?><?php if (isset($menu['link_class'])): ?> class="<?php echo $menu['link_class']; ?>"<?php endif; ?>>
				<?php endif; ?>

				<?php if (isset($menu['badge'])): ?>
				<span class="badge pull-right<?php if (isset($menu['badge']['class'])): ?> <?php echo $menu['badge']['class']; ?><?php endif; ?>"><?php echo $menu['badge']['label']; ?></span>
				<?php endif; ?>

				<?php if (isset($menu['icon'])): ?>
				<i class="<?php echo $menu['icon']; ?>"></i>
				<?php endif; ?>

				<?php if ($menuLabel): ?>
				<span><?php echo $menu['label']; ?></span>
				<?php endif; ?>

				<?php if ($menuFile && @stream_resolve_include_path($menuFile)):
				ob_start();
				include $menuFile;
				$menuFileContent = ob_get_contents();
				ob_end_clean();
				echo $menuFileContent;
				endif; ?>

				<?php if (isset($menu['page']) || isset($menu['href'])): ?></a><?php endif; ?>

				<?php if ($menuCollapse): ?>
				<ul class="<?php echo implode(" ", $menuCollapseClass); ?>" id="<?php echo $menuId; ?>">
					<?php self::make($menu['page'], $this->page, $this->module); ?>
				</ul>
				<?php endif; ?>

			</li>
			<?php
		}
	}

}