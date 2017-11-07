<?php

/* @Framework/Form/attributes.html.php */
class __TwigTemplate_4e9aea2d7e9d3be26e8444f35d656d076dca5582051ec2a80a5a7274c9bbfe8e extends Twig_Template
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
        $__internal_0aed26ee170b5d28caee92cd38fd55674838dbbef325ba2ddc79ea1e0d4e9e03 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0aed26ee170b5d28caee92cd38fd55674838dbbef325ba2ddc79ea1e0d4e9e03->enter($__internal_0aed26ee170b5d28caee92cd38fd55674838dbbef325ba2ddc79ea1e0d4e9e03_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/attributes.html.php"));

        $__internal_7040cddddf53bdf50342e1d92c39f065e92b6b55ecfe83c8118b462759099918 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7040cddddf53bdf50342e1d92c39f065e92b6b55ecfe83c8118b462759099918->enter($__internal_7040cddddf53bdf50342e1d92c39f065e92b6b55ecfe83c8118b462759099918_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/attributes.html.php"));

        // line 1
        echo "<?php foreach (\$attr as \$k => \$v): ?>
<?php if ('placeholder' === \$k || 'title' === \$k): ?>
<?php printf('%s=\"%s\" ', \$view->escape(\$k), \$view->escape(false !== \$translation_domain ? \$view['translator']->trans(\$v, array(), \$translation_domain) : \$v)) ?>
<?php elseif (true === \$v): ?>
<?php printf('%s=\"%s\" ', \$view->escape(\$k), \$view->escape(\$k)) ?>
<?php elseif (false !== \$v): ?>
<?php printf('%s=\"%s\" ', \$view->escape(\$k), \$view->escape(\$v)) ?>
<?php endif ?>
<?php endforeach ?>
";
        
        $__internal_0aed26ee170b5d28caee92cd38fd55674838dbbef325ba2ddc79ea1e0d4e9e03->leave($__internal_0aed26ee170b5d28caee92cd38fd55674838dbbef325ba2ddc79ea1e0d4e9e03_prof);

        
        $__internal_7040cddddf53bdf50342e1d92c39f065e92b6b55ecfe83c8118b462759099918->leave($__internal_7040cddddf53bdf50342e1d92c39f065e92b6b55ecfe83c8118b462759099918_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/attributes.html.php";
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
        return new Twig_Source("<?php foreach (\$attr as \$k => \$v): ?>
<?php if ('placeholder' === \$k || 'title' === \$k): ?>
<?php printf('%s=\"%s\" ', \$view->escape(\$k), \$view->escape(false !== \$translation_domain ? \$view['translator']->trans(\$v, array(), \$translation_domain) : \$v)) ?>
<?php elseif (true === \$v): ?>
<?php printf('%s=\"%s\" ', \$view->escape(\$k), \$view->escape(\$k)) ?>
<?php elseif (false !== \$v): ?>
<?php printf('%s=\"%s\" ', \$view->escape(\$k), \$view->escape(\$v)) ?>
<?php endif ?>
<?php endforeach ?>
", "@Framework/Form/attributes.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/attributes.html.php");
    }
}
