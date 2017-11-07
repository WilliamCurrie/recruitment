<?php

/* @Framework/Form/hidden_widget.html.php */
class __TwigTemplate_2ba0f56f9b19d48b6fd3b1473c856c7adbf9078996062e107dc532644b28ffe6 extends Twig_Template
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
        $__internal_9f08bc3924fbabd44ef2259deffcdcf7f5914eccd86e5eecf4a8bafe13cc7081 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9f08bc3924fbabd44ef2259deffcdcf7f5914eccd86e5eecf4a8bafe13cc7081->enter($__internal_9f08bc3924fbabd44ef2259deffcdcf7f5914eccd86e5eecf4a8bafe13cc7081_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/hidden_widget.html.php"));

        $__internal_df8a631e32bb660565c946da01e6e26666d21ad93d1600d5f0695f73317aa30d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_df8a631e32bb660565c946da01e6e26666d21ad93d1600d5f0695f73317aa30d->enter($__internal_df8a631e32bb660565c946da01e6e26666d21ad93d1600d5f0695f73317aa30d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/hidden_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'hidden')) ?>
";
        
        $__internal_9f08bc3924fbabd44ef2259deffcdcf7f5914eccd86e5eecf4a8bafe13cc7081->leave($__internal_9f08bc3924fbabd44ef2259deffcdcf7f5914eccd86e5eecf4a8bafe13cc7081_prof);

        
        $__internal_df8a631e32bb660565c946da01e6e26666d21ad93d1600d5f0695f73317aa30d->leave($__internal_df8a631e32bb660565c946da01e6e26666d21ad93d1600d5f0695f73317aa30d_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/hidden_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'hidden')) ?>
", "@Framework/Form/hidden_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/hidden_widget.html.php");
    }
}
