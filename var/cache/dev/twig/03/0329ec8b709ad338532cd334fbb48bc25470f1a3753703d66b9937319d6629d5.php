<?php

/* @Framework/Form/url_widget.html.php */
class __TwigTemplate_7323d476f9469c5128a7316d645120c09567e66e251c63abb52239e168880530 extends Twig_Template
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
        $__internal_157d9fe64649bb585ff32d890ceae68ed5e10fa8f748f7291a8d4f71613015ef = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_157d9fe64649bb585ff32d890ceae68ed5e10fa8f748f7291a8d4f71613015ef->enter($__internal_157d9fe64649bb585ff32d890ceae68ed5e10fa8f748f7291a8d4f71613015ef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/url_widget.html.php"));

        $__internal_36342a50761941ddd9e2774944e298618ff8658fc86223745b40e62c81989f8d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_36342a50761941ddd9e2774944e298618ff8658fc86223745b40e62c81989f8d->enter($__internal_36342a50761941ddd9e2774944e298618ff8658fc86223745b40e62c81989f8d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/url_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'url')) ?>
";
        
        $__internal_157d9fe64649bb585ff32d890ceae68ed5e10fa8f748f7291a8d4f71613015ef->leave($__internal_157d9fe64649bb585ff32d890ceae68ed5e10fa8f748f7291a8d4f71613015ef_prof);

        
        $__internal_36342a50761941ddd9e2774944e298618ff8658fc86223745b40e62c81989f8d->leave($__internal_36342a50761941ddd9e2774944e298618ff8658fc86223745b40e62c81989f8d_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/url_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'url')) ?>
", "@Framework/Form/url_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/url_widget.html.php");
    }
}
