/**
 * Block dependencies
 */
 import icon from './icon';
 import './style.scss';
 const { useState, useEffect } = wp.element;
 
 /**
  * Internal block libraries
  */
 const { __ } = wp.i18n;
 const { registerBlockType } = wp.blocks;
 const { RichText } = wp.editor;
 
 /**
  * Register block
  */
 export default registerBlockType(
     'tenyear/phonefeatures',
     {
         title: __( 'Ten year mobile features', 'tenyearmobile' ),
         description: __( 'Manage the image and features for a ten year mobile', 'tenyearmobile' ),
         category: 'common',
         icon: {
             background: 'rgba(254, 243, 224, 0.52)',
             src: icon,
         },   
         keywords: [
             __( 'Banner', 'tenyearmobile' ),
             __( 'Call to Action', 'tenyearmobile' ),
             __( 'featureone', 'tenyearmobile' ),
         ],
         attributes: {
             featureone: {
                 type: 'array',
                 source: 'children',
                 selector: '.featureone-body',
             },
       featuretwo: {
                 type: 'array',
                 source: 'children',
                 selector: '.featuretwo-body',
             },
       featurethree: {
                 type: 'array',
                 source: 'children',
                 selector: '.featurethree-body',
             },
       featurefour: {
                 type: 'array',
                 source: 'children',
                 selector: '.featurefour-body',
             },
       featurefive: {
                 type: 'array',
                 source: 'children',
                 selector: '.featurefive-body',
             },
             imageUrl: {
               type: "string",
               default: ''
             }
         },
         edit: props => {
             const { attributes: { imageUrl, featureone, featuretwo, featurethree, featurefour, featurefive }, className, setAttributes } = props;
 
             useEffect(() => {
               // Update the document title using the browser API
               setAttributes({ imageUrl: jsData.image_url });
             });
 
             return (
                 <div className={ className }>
 
                     <RichText
                         tagName="div"
                         multiline="p"
                         placeholder={ __( 'Add feature 1', 'tenyearmobile' ) }
                       onChange={ featureone => { setAttributes( { featureone } ) } }
                       value={ featureone }
                   />
           <RichText
                         tagName="div"
                         multiline="p"
                         placeholder={ __( 'Add feature 2', 'tenyearmobile' ) }
                       onChange={ featuretwo => { setAttributes( { featuretwo } ) } }
                       value={ featuretwo }
                   />
           <RichText
                         tagName="div"
                         multiline="p"
                         placeholder={ __( 'Add feature 3', 'tenyearmobile' ) }
                       onChange={ featurethree => { setAttributes( { featurethree } ) } }
                       value={ featurethree }
                   />
           <RichText
                         tagName="div"
                         multiline="p"
                         placeholder={ __( 'Add feature 4', 'tenyearmobile' ) }
                       onChange={ featurefour => { setAttributes( { featurefour } ) } }
                       value={ featurefour }
                   />
           <RichText
                         tagName="div"
                         multiline="p"
                         placeholder={ __( 'Add feature 5', 'tenyearmobile' ) }
                       onChange={ featurefive => { setAttributes( { featurefive } ) } }
                       value={ featurefive }
                   />
                 </div>
             );
         },
         save: props => {
             const { attributes: { imageUrl, featureone, featuretwo, featurethree, featurefour, featurefive } } = props;
             return (
                 <div>
           <div class="wp-block-tenyear-phonefeatures__image">
             <img src={imageUrl} alt="Back cover" />
             <img id="background-img" src={imageUrl} alt="Back cover" />
           </div>
           <div class="wp-block-tenyear-phonefeatures__features">
             <div class="feature featureone">
               { featureone }
             </div>
             <div class="feature featuretwo">
               { featuretwo }
             </div>
             <div class="feature featurethree">
               { featurethree }
             </div>
             <div class="feature featurefour">
               { featurefour }
             </div>	
             <div class="feature featurefive">
               { featurefive }
             </div>	
           </div>	
           <script>
             document.getElementById( 'background-img' ).src = jsData.image_url;
           </script>
                 </div>
             );
         },
     },
 );
 