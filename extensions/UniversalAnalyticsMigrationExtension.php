<?php

namespace Gen\Twig;

class UniversalAnalyticsMigrationExtension extends ExtensionBase
{
    public function getFunctions( ) 
    {
        return array(
            'submenu' => new \Twig_Function_Method($this, 'submenu', ['is_safe' => ['html']]),
        );        
    }
    
    public function getName( )
    {
        return 'universal_analytics_migration_extension';
    }
    
    public function submenu(array $menuItems)
    {
        $html = '';
        if(count($menuItems))
        {
            $html.= '<div data-magellan-expedition="fixed">';
            $html.= '    <dl class="sub-nav">';
            $html.= '        <dd><strong>In this chapter:</strong></dd>';
            $i = 0;
            foreach($menuItems as $id => $name)
            {
                $html.= '<dd data-magellan-arrival="' . $id . '"' . (!$i ? 'class="active"' : '') . '><a href="#' . $id . '">' . $name . '</a></dd>';
                $i++;
            }
            $html.= '    </dl>';
            $html.= '</div>';
        }
        
        return $html;
    }
}