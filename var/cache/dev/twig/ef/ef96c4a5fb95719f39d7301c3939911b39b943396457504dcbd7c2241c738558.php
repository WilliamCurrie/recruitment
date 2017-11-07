<?php

/* @Framework/Form/button_row.html.php */
class __TwigTemplate_92c4c16fe90ae45b7e50bfe5aa01b5f6e01341dcb956b13f441361b68673d946 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e9223680cbda482568617c6fc9a2038975acb43e6e289124b1e7083af7d1e1b6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e9223680cbda482568617c6fc9a2038975acb43e6e289124b1e7083af7d1e1b6->enter($__internal_e9223680cbda482568617c6fc9a2038975acb43e6e289124b1e7083af7d1e1b6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/button_row.html.php"));

        $__internal_4b4ffaafe780a28b96f7e4796dc3c2bc57b0e952358b198d84330ef1260b9c9a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4b4ffaafe780a28b96f7e4796dc3c2bc57b0e952358b198d84330ef1260b9c9a->enter($__internal_4b4ffaafe780a28b96f7e4796dc3c2bc57b0e952358b198d84330ef1260b9c9a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/button_row.html.php"));

        // line 1
        echo "<div>
    <?php echo \$view['form']->widget(\$form) ?>
</div>
";
        
        $__internal_e9223680cbda482568617c6fc9a2038975acb43e6e289124b1e7083af7d1e1b6->leave($__internal_e9223680cbda482568617c6fc9a2038975acb43e6e289124b1e7083af7d1e1b6_prof);

        
        $__internal_4b4ffaafe780a28b96f7e4796dc3c2bc57b0e952358b198d84330ef1260b9c9a->leave($__internal_4b4ffaafe780a28b96f7e4796dc3c2bc57b0e952358b198d84330ef1260b9c9a_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/button_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div>
    <?php echo \$view['form']->widget(\$form) ?>
</div>
", "@Framework/Form/button_row.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/button_row.html.php");
    }
}
