<?php

/* @Framework/Form/button_attributes.html.php */
class __TwigTemplate_2e7ab44003dc861383d91a70360ccfb22efe7a6bd675f57a1efb26ca2f962562 extends Twig_Template
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
        $__internal_6892d7204bb42191d493eb64c19110907642179780e8d493311337f22bca94d9 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_6892d7204bb42191d493eb64c19110907642179780e8d493311337f22bca94d9->enter($__internal_6892d7204bb42191d493eb64c19110907642179780e8d493311337f22bca94d9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/button_attributes.html.php"));

        $__internal_d4d996e32ab918b36c4f75083667a1d9e3fd6ba0f171c13bfd0def2d3e7f2dbd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d4d996e32ab918b36c4f75083667a1d9e3fd6ba0f171c13bfd0def2d3e7f2dbd->enter($__internal_d4d996e32ab918b36c4f75083667a1d9e3fd6ba0f171c13bfd0def2d3e7f2dbd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/button_attributes.html.php"));

        // line 1
        echo "id=\"<?php echo \$view->escape(\$id) ?>\" name=\"<?php echo \$view->escape(\$full_name) ?>\"<?php if (\$disabled): ?> disabled=\"disabled\"<?php endif ?>
<?php echo \$attr ? ' '.\$view['form']->block(\$form, 'attributes') : '' ?>
";
        
        $__internal_6892d7204bb42191d493eb64c19110907642179780e8d493311337f22bca94d9->leave($__internal_6892d7204bb42191d493eb64c19110907642179780e8d493311337f22bca94d9_prof);

        
        $__internal_d4d996e32ab918b36c4f75083667a1d9e3fd6ba0f171c13bfd0def2d3e7f2dbd->leave($__internal_d4d996e32ab918b36c4f75083667a1d9e3fd6ba0f171c13bfd0def2d3e7f2dbd_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/button_attributes.html.php";
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
        return new Twig_Source("id=\"<?php echo \$view->escape(\$id) ?>\" name=\"<?php echo \$view->escape(\$full_name) ?>\"<?php if (\$disabled): ?> disabled=\"disabled\"<?php endif ?>
<?php echo \$attr ? ' '.\$view['form']->block(\$form, 'attributes') : '' ?>
", "@Framework/Form/button_attributes.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/button_attributes.html.php");
    }
}
