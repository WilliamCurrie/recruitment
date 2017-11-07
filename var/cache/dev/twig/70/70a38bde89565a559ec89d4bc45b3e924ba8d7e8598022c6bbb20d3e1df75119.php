<?php

/* @Framework/Form/reset_widget.html.php */
class __TwigTemplate_9f1f4ecf93569d56084c2103d2b77c4378151c4cf8b4fd72359a0e0ebefeafe6 extends Twig_Template
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
        $__internal_549177611f24466087eb3eb9dfdb9d88ee57dfab1deded57168dbfba7ebc4275 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_549177611f24466087eb3eb9dfdb9d88ee57dfab1deded57168dbfba7ebc4275->enter($__internal_549177611f24466087eb3eb9dfdb9d88ee57dfab1deded57168dbfba7ebc4275_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/reset_widget.html.php"));

        $__internal_43c29a16cdae052a76c7a0ec0d480283ba69b09b5056f81781c461f058f0cec7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_43c29a16cdae052a76c7a0ec0d480283ba69b09b5056f81781c461f058f0cec7->enter($__internal_43c29a16cdae052a76c7a0ec0d480283ba69b09b5056f81781c461f058f0cec7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/reset_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'button_widget', array('type' => isset(\$type) ? \$type : 'reset')) ?>
";
        
        $__internal_549177611f24466087eb3eb9dfdb9d88ee57dfab1deded57168dbfba7ebc4275->leave($__internal_549177611f24466087eb3eb9dfdb9d88ee57dfab1deded57168dbfba7ebc4275_prof);

        
        $__internal_43c29a16cdae052a76c7a0ec0d480283ba69b09b5056f81781c461f058f0cec7->leave($__internal_43c29a16cdae052a76c7a0ec0d480283ba69b09b5056f81781c461f058f0cec7_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/reset_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'button_widget', array('type' => isset(\$type) ? \$type : 'reset')) ?>
", "@Framework/Form/reset_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/reset_widget.html.php");
    }
}
