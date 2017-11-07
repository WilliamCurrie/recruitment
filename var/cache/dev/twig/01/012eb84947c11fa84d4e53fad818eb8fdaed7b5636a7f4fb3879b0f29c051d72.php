<?php

/* @Framework/Form/textarea_widget.html.php */
class __TwigTemplate_67dda2b1c162a705a804ec45c402ffb909e483521afac7edbd49b000af24a272 extends Twig_Template
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
        $__internal_a89daacdd9be3ae37584a7c1900677007b1a0c07a2ac9b0575658553c44d68e8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a89daacdd9be3ae37584a7c1900677007b1a0c07a2ac9b0575658553c44d68e8->enter($__internal_a89daacdd9be3ae37584a7c1900677007b1a0c07a2ac9b0575658553c44d68e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/textarea_widget.html.php"));

        $__internal_8156e62c54a3f3cb449260dcd335be660e16ba8315cb7d1f3d61a4aaf77af0db = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8156e62c54a3f3cb449260dcd335be660e16ba8315cb7d1f3d61a4aaf77af0db->enter($__internal_8156e62c54a3f3cb449260dcd335be660e16ba8315cb7d1f3d61a4aaf77af0db_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/textarea_widget.html.php"));

        // line 1
        echo "<textarea <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>><?php echo \$view->escape(\$value) ?></textarea>
";
        
        $__internal_a89daacdd9be3ae37584a7c1900677007b1a0c07a2ac9b0575658553c44d68e8->leave($__internal_a89daacdd9be3ae37584a7c1900677007b1a0c07a2ac9b0575658553c44d68e8_prof);

        
        $__internal_8156e62c54a3f3cb449260dcd335be660e16ba8315cb7d1f3d61a4aaf77af0db->leave($__internal_8156e62c54a3f3cb449260dcd335be660e16ba8315cb7d1f3d61a4aaf77af0db_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/textarea_widget.html.php";
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
        return new Twig_Source("<textarea <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>><?php echo \$view->escape(\$value) ?></textarea>
", "@Framework/Form/textarea_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/textarea_widget.html.php");
    }
}
