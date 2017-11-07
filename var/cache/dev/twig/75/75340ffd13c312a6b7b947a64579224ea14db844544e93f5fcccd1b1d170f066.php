<?php

/* @Framework/Form/button_widget.html.php */
class __TwigTemplate_8dddd7a1b5bb229e1b1b72885dae61054e23b171456ceea5c3cccb25934295ea extends Twig_Template
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
        $__internal_0fc83d1f795687d0f6fbb4972870da9206570a451dadc551f9e4743d75af4b32 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0fc83d1f795687d0f6fbb4972870da9206570a451dadc551f9e4743d75af4b32->enter($__internal_0fc83d1f795687d0f6fbb4972870da9206570a451dadc551f9e4743d75af4b32_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/button_widget.html.php"));

        $__internal_95a51fad6a39753c4e6f38605fc4466cec55a561988b45fd2e6e1c2f6e884d26 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_95a51fad6a39753c4e6f38605fc4466cec55a561988b45fd2e6e1c2f6e884d26->enter($__internal_95a51fad6a39753c4e6f38605fc4466cec55a561988b45fd2e6e1c2f6e884d26_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/button_widget.html.php"));

        // line 1
        echo "<?php if (!\$label) { \$label = isset(\$label_format)
    ? strtr(\$label_format, array('%name%' => \$name, '%id%' => \$id))
    : \$view['form']->humanize(\$name); } ?>
<button type=\"<?php echo isset(\$type) ? \$view->escape(\$type) : 'button' ?>\" <?php echo \$view['form']->block(\$form, 'button_attributes') ?>><?php echo \$view->escape(false !== \$translation_domain ? \$view['translator']->trans(\$label, array(), \$translation_domain) : \$label) ?></button>
";
        
        $__internal_0fc83d1f795687d0f6fbb4972870da9206570a451dadc551f9e4743d75af4b32->leave($__internal_0fc83d1f795687d0f6fbb4972870da9206570a451dadc551f9e4743d75af4b32_prof);

        
        $__internal_95a51fad6a39753c4e6f38605fc4466cec55a561988b45fd2e6e1c2f6e884d26->leave($__internal_95a51fad6a39753c4e6f38605fc4466cec55a561988b45fd2e6e1c2f6e884d26_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/button_widget.html.php";
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
        return new Twig_Source("<?php if (!\$label) { \$label = isset(\$label_format)
    ? strtr(\$label_format, array('%name%' => \$name, '%id%' => \$id))
    : \$view['form']->humanize(\$name); } ?>
<button type=\"<?php echo isset(\$type) ? \$view->escape(\$type) : 'button' ?>\" <?php echo \$view['form']->block(\$form, 'button_attributes') ?>><?php echo \$view->escape(false !== \$translation_domain ? \$view['translator']->trans(\$label, array(), \$translation_domain) : \$label) ?></button>
", "@Framework/Form/button_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/button_widget.html.php");
    }
}
