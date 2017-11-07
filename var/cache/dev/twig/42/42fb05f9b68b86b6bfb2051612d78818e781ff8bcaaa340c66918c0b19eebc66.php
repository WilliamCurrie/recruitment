<?php

/* @Framework/Form/hidden_row.html.php */
class __TwigTemplate_793fcd2aed26a2b746548aa73c8cc7942f31c45e17af99a41450763a65fbf2ba extends Twig_Template
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
        $__internal_11f8c2d5a1b1b3f3714721442e12dda9fe40b89a36a8c15178937b745e1b5b36 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_11f8c2d5a1b1b3f3714721442e12dda9fe40b89a36a8c15178937b745e1b5b36->enter($__internal_11f8c2d5a1b1b3f3714721442e12dda9fe40b89a36a8c15178937b745e1b5b36_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/hidden_row.html.php"));

        $__internal_5cd37d7537830de4d72e6fdd812f71c63c01a8a9472b3eeb6b174a192a665de3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5cd37d7537830de4d72e6fdd812f71c63c01a8a9472b3eeb6b174a192a665de3->enter($__internal_5cd37d7537830de4d72e6fdd812f71c63c01a8a9472b3eeb6b174a192a665de3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/hidden_row.html.php"));

        // line 1
        echo "<?php echo \$view['form']->widget(\$form) ?>
";
        
        $__internal_11f8c2d5a1b1b3f3714721442e12dda9fe40b89a36a8c15178937b745e1b5b36->leave($__internal_11f8c2d5a1b1b3f3714721442e12dda9fe40b89a36a8c15178937b745e1b5b36_prof);

        
        $__internal_5cd37d7537830de4d72e6fdd812f71c63c01a8a9472b3eeb6b174a192a665de3->leave($__internal_5cd37d7537830de4d72e6fdd812f71c63c01a8a9472b3eeb6b174a192a665de3_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/hidden_row.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->widget(\$form) ?>
", "@Framework/Form/hidden_row.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/hidden_row.html.php");
    }
}
